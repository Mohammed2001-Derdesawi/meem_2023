<?php

namespace Modules\Student\Repositories\Cart;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Course\Entities\Image\CourseImage;
use Modules\Student\Entities\Cart\Cart;
use Modules\Student\Entities\Student\Student;

class CartRepository implements CartInterface
{

    public function show ($relations , $params , $gurad) 
    {
        if (Auth::guard($gurad)->check()) {
            $my_cart = Cart::where('student_id' , Auth::guard($gurad)->user()->id)
            ->with($relations)
            ->withCount($relations)
            ->withSum($relations , 'price')->get();
            if (!$my_cart) {
                // return with message
            }
            // return to view with $my_cart
        }

    }


    public function store($data)
    {
        $course = $data;

        if (Auth::guard('student')->check()) {

            $cart_student = Student::find(Auth::guard('student')->user()->id)->with('cart')->first();
            if (!$cart_student->cart()) {
                $cart = Cart::create([
                    'student_id' => Auth::guard('student')->user()->id,
                ]);
                DB::table('cart_course')->insert(['cart_id' => $cart->id, 'course_id' => $course->id , 'price' => $course->price]);
                return response()->json([
                    'message' => 'Course added to cart successfully'
                ]);
            }

            $cart_course = DB::table('cart_course')->where('cart_id', $cart_student->cart->id)->where('course_id' , $course->id)->first();
            if (!$cart_course->exists()) {
                DB::table('cart_course')->insert(['cart_id' => $cart_student->cart->id , 'course_id' => $course->id , 'price' => $course->price]);
                return response()->json([
                    'message' => 'Course added to cart successfully'
                ]);
            }
            return response()->json([
                'message' => 'Course exists in the cart'
            ]);
        }
    }


    public function delete($id)
    {
        if (Auth::guard('student')->check()) {
            $cart_student = Student::find(Auth::guard('student')->id())->with('cart')->first();
            DB::table('cart_course')->where('cart_id' , $cart_student->cart->id)->where('course_id' , $id)->delete();
            return response()->json([
                'message' => 'Course deleted from cart successfully'
            ]);
        }
    }
}

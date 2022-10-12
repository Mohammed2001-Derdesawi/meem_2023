<?php

namespace Modules\Student\Repositories\Cart;

interface CartInterface {

    public function show($relations , $params , $gurad);

    public function store($data);

    public function delete($id);

}
?>

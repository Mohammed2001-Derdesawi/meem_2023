<?php

namespace Modules\Student\Repositories\Cart;

interface CartInterface {

    public function store($data);
    public function delete($id);

}
?>

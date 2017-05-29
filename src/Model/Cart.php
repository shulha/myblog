<?php

namespace Mystore\Model;

use Shulha\Framework\Model\Model;
use Shulha\Framework\Session\Session;

class Cart extends Model
{
    function addToCart($id, $count = 1)
    {
        $_SESSION['cart'][$id] = $_SESSION['cart'][$id] + $count;
//        if ($_SESSION['user_id']) dd($_SESSION);
        $cart_content = serialize($_SESSION['cart']);
        if ($_COOKIE)
            SetCookie("cart", $cart_content, time() + 3600 * 24 * 365, "/");
        else
            throw new \Exception('Enable Cookies');

        return true;
    }

    function products($id)
    {
        return $this->qb->query('SELECT * FROM products WHERE id=' . $id)->first();
    }

    function delFromCart($id, $count = 1)
    {
    }

    function clearCart()
    {
    }

    public function getCartData()
    {
        $smal_cart = [];
        $total_price = 0;
        $total_count = 0;

        if (@$cart = unserialize($_COOKIE['cart'])) {
            foreach ($cart as $id => $count) {
                $product = $this->products($id);
                $total_price += $product->price * $count;
                $total_count += $count;
            }

            $smal_cart['cart_count'] = $total_count;
            $smal_cart['cart_price'] = $total_price;
        }

        return $smal_cart ?? null;
    }
}
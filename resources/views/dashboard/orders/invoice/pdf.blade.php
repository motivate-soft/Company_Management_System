<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet"> -->
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>
<body>
    <div class="container">
    <?php
       
        if (strpos($content, '[o.id]')) {
            $content = str_replace('[o.id]', $order->id, $content);
        }
        if (strpos($content, '[o.client]')) {
            $content = str_replace('[o.client]', $user->name, $content);
        }
        if (strpos($content, '[o.paymethod]')) {
            $content = str_replace('[o.paymethod]', $order->payment_method, $content);
        }
        if (strpos($content, '[c.phoneno]')) {
            $content = str_replace('[c.phoneno]', $user->phone, $content);
        }
        if (strpos($content, '[c.address]')) {
            $content = str_replace('[c.address]', $user_address->country.'/'.$user_address->state.'/'.$user_address->city.'/'.$user_address->neighborhood.'/'.$user_address->address, $content);
        }
        if (strpos($content, '[o.fee]')) {
            $content = str_replace('[o.fee]', $order->delivery_fee . '$', $content);
        }
        if (strpos($content, '[o.subtotal]')) {
            $content = str_replace('[o.subtotal]', $subtotal . '$', $content);
        }
        if (strpos($content, '[o.date]')) {
            $content = str_replace('[o.date]', date('Y-m-d', strtotime($order->updated_at)), $content);
        }
        if (strpos($content, '[o.tax]')) {
            $content = str_replace('[o.tax]', number_format($order->vat * $subtotal / 100, 2) . '$', $content);
        }
        $total = $order->vat * $subtotal / 100 +  $subtotal + $order->delivery_fee;
        
        if (strpos($content, '[o.total]')) {
            $content = str_replace('[o.total]', number_format($total, 2) . '$', $content);
        }
        if (strpos($content, '[o.note]')) {
            $content = str_replace('[o.note]', $order->note, $content);
        }
        if (strpos($content, '[o.status]')) {
            $content = str_replace('[o.status]', $order->status, $content);
        }
        if (strpos($content, '[p.name]')) {
            $content = str_replace('[p.name]', $product_name, $content);
        }
        if (strpos($content, '[p.img]')) {
            $content = str_replace('[p.img]', $product_img, $content);
        }
        if (strpos($content, '[p.qty]')) {
            $content = str_replace('[p.qty]', $product_qty, $content);
        }
        if (strpos($content, '[p.options]')) {
            $content = str_replace('[p.options]', $product_options, $content);
        }
    ?>
        {!! $content !!}
    </div>
</body>
</html>
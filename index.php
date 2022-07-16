<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="/" method="post">
        <div>
            <label for="a">Canh a</label>
            <input name="a" type="text" pattern="\d*" required>
        </div>
        <div>
            <label for="b">Canh b</label>
            <input name="b" type="text" pattern="\d*" required>
        </div>
        <div>
            <label for="c">Canh c</label>
            <input name="c" type="text" pattern="\d*" required>
        </div>
        <button type="submit">Send</button>
    </form> -->

    <form action="/" method="post">
        <div>
            <label for="name">Ten khach</label>
            <input name="name" type="text" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input name="email" type="email" required>
        </div>
        <div>
            <label for="phone">So dien thoai</label>
            <input name="phone" type="text" pattern="\d*" required>
        </div>
        <div>
            <label for="product">Ten SP</label>
            <input name="product" type="text" required>
        </div>
        <div>
            <label for="price">Gia</label>
            <input name="price" type="text" pattern="\d*" required>
        </div>
        <div>
            <label for="quantity">SL</label>
            <input name="quantity" type="number" pattern="\d+" required>
        </div>
        <button type="submit">Send</button>
    </form>

    <?php 
        // if(isset($_POST['a'])){
        //     $a = $_POST['a'];
        //     $b = $_POST['b'];
        //     $c = $_POST['c'];

        //     $p = ($a + $b + $c) / 2;

        //     echo "KQ: " . strval(sqrt($p * ($p - $a) * ($p - $b) * ($p - $c)));
        // } 

        if(isset($_POST['name'])){
            echo "Ten khach: " . $_POST['name'] . "<br>";
            echo "Email: " . $_POST['email'] . "<br>";
            echo "So dien thoai: " . $_POST['phone'] . "<br>";
            echo "Ten SP: " . $_POST['product'] . "<br>";
            echo "Gia: " . $_POST['price'] . "<br>";
            echo "SL: " . $_POST['quantity'] . "<br>";
            echo "Thanh tien: " . $_POST['price'] * $_POST['quantity'];
        }
    ?>
</body>
</html>
<?php  
    require_once './header.php';
    use App\MyClass;
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>MyClass</h1>
                <?php  
                    $myClass = new MyClass();
                    echo $myClass->sayHello();
                ?>
            </div>
        </div>
    </div>
<?php  
    require_once './footer.php';
?>
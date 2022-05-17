            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i>
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-primary bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-primary bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
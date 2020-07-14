<ul class="nav">
                    <li class="nav-item <?php if($page == "home") { echo "active";}?>">
                        <a class="nav-link" href=" <?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/index.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if($page == "users") { echo "active";}?>">
                        <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/users.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if($page == "products") { echo "active";}?>">
                        <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/products.php">
                            <i class="nc-icon nc-app"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if($page == "orders") { echo "active";}?>">
                        <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/orders.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Orders</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if($page == "categories") { echo "active";}?>">
                        <a class="nav-link" href=" <?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/categories.php">
                            <i class="nc-icon nc-bullet-list-67"></i>
                            <p>Categories</p>
                        </a>
                        <li>
                                <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /">
                                <i class="nc-icon nc-button-power"></i>
                                    <p>Log out</p>
                                </a>
                            </li>
                    </li>
                </ul>
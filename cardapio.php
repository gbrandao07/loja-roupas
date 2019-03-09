
    <?php include "header.php"; ?>     

           
        <div class="cardapio-list small-11 large-12 columns no-padding small-centered">
            
            <div class="global-page-container">
                <div class="cardapio-title small-12 columns no-padding">
                    <h3>Cardapio</h3>
                    <hr></hr>
                </div>

                <?php

                    $server = 'localhost';
                    $user = 'root';
                    $password = 'root';
                    $db_name = 'restaurante';
                    $port = '8889';

                    $db_connect = new mysqli($server,$user,$password,$db_name,$port);
                    mysqli_set_charset($db_connect,"utf8"); // para inserir com acentuacao corretamente

                    if ($db_connect->connect_error) {
                        echo 'Falha: ' . $db_connect->connect_error;
                    } else {
                        //echo 'Conexão feita com sucesso' . '<br><br>';

                        $result = $db_connect->query("select distinct categoria from pratos");

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                                
                                $categoria = $row["categoria"]; ?>
                                
                                <div class="category-slider small-12 columns no-padding">
                                <h4><?php echo $categoria; ?></h4>

                                <div class="slider-cardapio">
                                    <div class="slider-002 small-12 small-centered columns">

                                        
                                        <?php 

                                            $result2 = $db_connect->query("select * from pratos where categoria = '$categoria'");

                                            if ($result2->num_rows > 0) {

                                                while ($row2 = $result2->fetch_assoc()) { ?>
                                                    
                                                     <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                                                        <div class="cardapio-item">
                                                            <a href="prato.php?prato=<?php echo $row2['codigo']; ?>">
                                                                
                                                                <div class="item-image">
                                                                    <img src="img/cardapio/<?php echo $row2['codigo']?>.jpg" alt="<?php  ?>"/>   
                                                                </div>

                                                                <div class="item-info">
                                                                    
                                                                
                                                                    <div class="title"><?php echo $row2['nome'];?></div>
                                                                </div>

                                                                <div class="gradient-filter">
                                                                </div>
                                                                
                                                            </a>
                                                        </div>
                                                    </div>                                                    

                                                <?php }

                                            }


                                        ?>

                                       
                                    </div>
                                </div>
                            </div>

                            <?php }
                        } else {
                            echo "Não há pratos";
                        }
                    }
                ?>



            </div>
        </div>

            

   


        <?php include "footer.php"; ?>
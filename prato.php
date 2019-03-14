
    <?php include "header.php"; ?>
           
        <div class="product-page small-11 large-12 columns no-padding small-centered">
            
            <div class="global-page-container">


                <?php 


                    $cod_prato = $_GET["prato"];

                    // echo $cod_prato;

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

                        $result = $db_connect->query("select * from pratos where codigo = '$cod_prato'");

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) { 
                                
                                $nome = $row["nome"];
                                $categoria = $row["categoria"];
                                $descricao = $row["descricao"];
                                $preco = $row["preco"];
                                $calorias = $row["calorias"];

                            }
                        }
                    }
                ?>

                <?php if ($nome != NULL) { ?>
                    <div class="product-section">
                        <div class="product-info small-12 large-5 columns no-padding">
                            <h3><?php echo $nome; ?></h3>
                            <h4><?php echo $categoria; ?></h4>
                            <p><?php echo $descricao; ?>
                            </p>

                            <h5><b>Preço: </b>R$ <?php echo $preco; ?></h5>
                            <h5><b>Calorias: </b><?php echo $calorias; ?></h5> 
                        </div>

                        <div class="product-picture small-12 large-7 columns no-padding">
                            <img src="img/cardapio/<?php echo $cod_prato; ?>.jpg" alt="Foto do prato: <?php echo $nome; ?>">
                        </div>

                    </div>
                <?php } else {

                    echo "Prato não encontrado! <br>";

                } ?>

                <div class="go-back small-12 columns no-padding">
                    <a href="cardapio.php"><< Voltar ao Cardápio</a>
                </div>

            </div>
        </div>
            


        <?php include "footer.php"; ?>
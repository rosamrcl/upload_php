<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>
    <link rel="stylesheet" href="../resources/css/index.css">
</head>

<body>
    <main>
        <div class="box">
            <fieldset>
                <legend>Dados Recebidos</legend>
                <?php 
                if($_SERVER['REQUEST_METHOD']=="POST"){

                    $nome=$_POST["nome"];
                    $lastaname=$_POST["lastaname"];
                    $email=$_POST["email"];
                    $tel=$_POST["tel"];
                    $adress=$_POST["adress"];
                    $number=$_POST["number"];
                    $complemento=$_POST["complemento"];
                    $cidade=$_POST["cidade"];
                    $estado=$_POST["estado"];
                    $cep=$_POST["cep"];
                    
                    echo "<p><strong>Nome:</strong>$nome</p>";
                    echo "<p><strong>Sobrenome:</strong>$lastaname</p>";                
                    echo "<p><strong>E-mail:</strong>$email</p>";
                    echo "<p><strong>Telefone:</strong>$tel</p>";
                    echo "<p><strong>Endereço:</strong>$adress</p>";
                    echo "<p><strong>Nº:</strong>$number</p>";
                    echo "<p><strong>Complemento:</strong>$complemento</p>";
                    echo "<p><strong>Cidade:</strong>$cidade</p>";
                    echo "<p><strong>Estado:</strong>$estado</p>";
                    echo "<p><strong>CEP:</strong>$cep</p>";
                }else{
                    header("Location:index.php");
                    exit();
                }
                
                
                ?>

                <?php
                $folder=__DIR__ ."/uploads/";
                if(!file_exists($folder)||!is_dir($folder)){
                    mkdir($folder,0755);                    
                }
                var_dump([
                    "filesize"=>ini_get("upload_max_filesize"),
                    "postsize"=>ini_get("post_max_size"),
                ]);
                $getPost=filter_input(INPUT_GET,"POST",FILTER_VALIDATE_BOOLEAN);
                var_dump($_FILES);

                if($_FILES&& !empty($_FILES["file"]["name"])){
                    $file = $_FILES["file"];
                    var_dump($_FILES);

                    $allowebTypes=[
                        "image/jpeg",
                        "image/png",
                        "application/pdf"
                    ];
                }elseif($getPost){
                        echo "<p class='trigger warning'>Whoops parece que o arquivo que você selecionou é grande demais!</p>";
                        }else{
                            if($_FILES){
                                echo "<p class='trigger warning'>Selecione um arquivo antes de Enviar!</p>";

                            }
                        }
                        var_dump(scandir(__DIR__ ."/uploads"));
                    ?>

            </fieldset>
        </div>
        <a href="https://github.com/RosaCL" target="_blank"><img src="../public/img/costureza.png" alt=""></a>
    </main>


</body>

</html>
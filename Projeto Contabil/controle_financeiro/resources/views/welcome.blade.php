
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Lateral</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .container{
            display: flex;
            width:100%;
        }

        /* Estilos para a barra lateral */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #5a7478;
            color: #ffffff;
            padding: 20px;
            box-sizing: border-box;
            /* position: fixed; */
        }

        .sidebar h2 {
            margin-top: 0;
            text-align: center;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            margin: 0;
            background-color: #393636;
            border-radius:5px;
        }

        /* Estilos para o conteúdo principal */
        .wrapper {
            width: 100%;
        }

        .wrapper h1 {
            font-size: 24px;
        }

        .wrapper p {
            font-size: 16px;

        }

        header {
            display: flex;
            align-items: center;
        }
        nav{
            background: #5a7478;
            width:100%;
            padding: 1rem;
        }

        nav ul {
            display: flex;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        nav ul li {
            padding-inline: 1rem;
            list-style: none;
        }

        nav ul li a {
          color:#fff;
          transition: linear 1.00ms
        }
        nav ul li a:hover {
          color:red;
        }

        .content{
            padding: 1.25rem
        }       
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="brand"><img src="" alt=""><span>Controle Orçamentário</span></div>

            <ul>
                <li><a href="#">Renda Mensal</a></li>
                <li><a href="#">Despesas Mensal</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </div>
        <div class="wrapper">
            <header>
                <nav>
                    <ul>
                        <li><a href="">Início</a></li>
                        <li><a href="">Sobre</a></li>
                        <li><a href="">Contato</a></li>
                    </ul>
                </nav>
            </header>
            <div class="content">
                <h1>Bem-vindo ao Meu Site</h1>
                <p>Este é um exemplo de um layout com um menu lateral.</p>
            </div>
        </div>
    </div>
</body>

</html>
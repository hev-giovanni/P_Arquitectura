

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    // Verificar si se ha pasado el ID a través de la URL
    if (isset($_GET["id"])) {
        // Obtener el ID del usuario desde la URL
        $id = $_GET["id"];

        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root"; // Reemplazar con tu nombre de usuario de MySQL
        $password = ""; // Reemplazar con tu contraseña de MySQL
        $dbname = "accesorfid";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consultar el usuario por el ID ingresado
        $sql = "SELECT * FROM acceso WHERE tarjeta = $id";
        $result = $conn->query($sql);

        // Mostrar los resultados
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            //echo "ID: " . $row["id"] . "<br>";
            echo "Nombre: " . $row["nombre"] ;
            echo "\n";
            //echo "Apellido: " . $row["apellidos"] . "<br>";
            echo "Status: " . $row["Status"] . "<br>";
            echo "Tarjeta: " . $row["tarjeta"] ;
            echo "\n";
            //echo "Acceso: " . $row["acceso"] . "<br>";
        } else {
            echo "<h2>No se encontraron resultados para el ID ingresado.</h2>";
            echo "id malo".$id;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styl7.css">
        <title>Hurtownia</title>
    </head>
    <body>
        <section id="logo">
            <img alt="hurtownia komputerowa" src="komputer.png">
        </section>
        <section id="lista">
            <ul>
                <li>Sprzęt
                    <ol>
                        <li>Procesory</li>
                        <li>Pamięć RAM</li>
                        <li>Monitory</li>
                        <li>Obudowy</li>
                        <li>Karty graficzne</li>
                        <li>Dyski twarde</li>
                    </ol>
                </li>
                <li>Oprogramowanie</li>
            </ul>
        </section>
        <section id="formularz">
            <h2>Hurtownia komputerowa</h2>
            <form method="post" action="sklep.php">
                <span>Wybierz kategorię sprzętu</span>
                <input type="number" name="category">
                <input type="submit" value="SPRAWDŹ">
            </form>
        </section>
        <section id="glowny">
            <h1>Podzespoły we wskazanek kategorii</h1>
            <?php
                $connect = mysqli_connect('localhost', 'root', '', 'sklep');
                    if (!isset($_POST["category"])) {
                        echo "Wybierz poprawną kategorię sprzętu";
                    }else {
                        $kat=$_POST['category'];
                        $sql="SELECT nazwa, opis, cena FROM podzespoly WHERE typy_id = $kat";
                        $query = mysqli_query($connect, $sql);

                            while($wiersz = mysqli_fetch_assoc($query)){
                                echo '<p>' . $wiersz["nazwa"] . ' ' . $wiersz["opis"] . ' CENA: ' . $wiersz["cena"] . '</p>';
                            }
                    }
                 
                mysqli_close($connect);
            ?>
        </section>
        <section id="stopka">
            <h3>Hurtownia działa od poniedziałku do soboty w godzinach 7<sup>00</sup>-16<sup>00</sup></h3>
            <a href="mailto:bok@hurtownia.pl">Napisz do nas</a>
            <span>Partnerzy</span>
            <a href="http://intel.pl" target="_blank">Intel</a>
            <a href="http://amd.pl" target="_blank">AMD</a>
            <p>Stronę wykonał: 01234567890</p>
        </section>
    </body>
</html>
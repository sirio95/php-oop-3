<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP3</title>

    <?php
    require 'classes.php';
    $salario_dip_1 = new Salary(2000, True, True);
    $dip_1 = new Impiegato('Michele', 'Rossi', '06/08/1992', 'Marte', 'm1a2r3t4e5', '01/09/2012', $salario_dip_1);
    $capo_1 = new Capo('Saverio', 'Franceschi', '12/03/1987', 'Urano', 'u1r2a3n4o5', 4000, 10000);
    ?>
    <style>

    </style>
</head>

<body>
    <section>
        <?php
        echo $dip_1->get_impiegato_html();
        ?>
    </section>
    <section>
        <?php
        echo $capo_1->get_capo_html();
        ?>
    </section>
</body>

</html>
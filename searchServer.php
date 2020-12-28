<?php
require_once 'config.php';

if(isset($_POST["query"]) && !empty(trim($_POST["query"]))) {

    $query = trim($_POST["query"]);
    $query = mysqli_real_escape_string($db, $query);
    $query = htmlspecialchars($query);

    if (!empty($query))
    {
        if (strlen($query) == 0) {
            $text = '<p>Слишком короткий поисковый запрос.</p>';
        }  else {
            $q = "SELECT *
                  FROM products WHERE name LIKE '%$query%'
                  OR genre LIKE '%$query%' OR producer LIKE '%$query%'
                  OR age_rating LIKE '%$query%' OR price LIKE '%$query%'";

            $result = mysqli_query($db, $q);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $num = mysqli_num_rows($result);

                $text = '<p>По запросу <b>'.$query.'</b> найдено совпадений: '.$num.'</p>';

                do {
                    // Делаем запрос, получающий ссылки на статьи
                    $q1 = "SELECT id FROM products WHERE id = '$row[id]'";
                    $result1 = mysqli_query($db, $q1);

                    if (mysqli_num_rows($result) > 0) {
                        $row1 = mysqli_fetch_assoc($result1);
                    }

                    $text .= '<p><a href="read_record.php?id='.$row['id'].'">'.$row['name'].'</a></p>';

                } while ($row = mysqli_fetch_assoc($result));
            } else {
                $text = '<p>По вашему запросу ничего не найдено.</p>';
            }
        }
    } else {
        $text = '<p>Задан пустой поисковый запрос.</p>';
    }
}
else {
    $text = '<p>Задан пустой поисковый запрос</p>';
}
echo $text;
?>

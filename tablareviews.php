<?php
$link = mysqli_connect("localhost", "root") or //me conecto a la base de datos
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($link,'EquiposFutbol') or die(mysqli_error($link));//selecciono la bd


 
 $sql = 'CREATE TABLE reviews (
        review_equipo_id INTEGER UNSIGNED NOT NULL, 
        review_date     DATE             NOT NULL, 
        reviewer_name   VARCHAR(255)     NOT NULL, 
        review_comment  VARCHAR(255)     NOT NULL, 
        review_rating   TINYINT UNSIGNED NOT NULL  DEFAULT 0, 
        KEY (review_equipo_id)
    )
    ENGINE=MyISAM';
mysqli_query($link,$sql) or die(mysqli_error($link));
 
 
 echo $sql;
 
 

$sql = <<<ENDSQL
INSERT INTO reviews
    (review_equipo_id, review_date, reviewer_name, review_comment,
        review_rating)
VALUES 
    (1, "2008-09-23", "John Doe", "I thought this was a great movie
        Even though my girlfriend made me see it against my will.", 4),
    (1, "2008-09-23", "Billy Bob", "I liked Eraserhead better.", 2),
    (4, "2008-09-28", "Peppermint Patty", "I wish I'd have seen it
        sooner!", 5),
    (2, "2008-09-23", "Marvin Martian", "This is my favorite movie. I
        didn't wear my flair to the movie but I loved it anyway.", 5),
    (3, "2008-09-23", "George B.", "I liked this movie, even though I
        Thought it was an informational video from my travel agent.", 3)
ENDSQL;
mysqli_query($link,$sql) or die(mysqli_error($link));
if (mysqli_query($link,$sql)) {
    echo "La tabla Equipos se creó correctamente\n";
} else {
    echo 'Error al crear la tabla: ' . mysqli_error($link) . "\n";
}
  
 ?>
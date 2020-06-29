<?php
   include 'dir/connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@500&display=swap" rel="stylesheet">
    <title>Quiz</title>
</head>
<body>
    <div class="container">
        <h1 class="white h-primary mb-3">Welcome to QuizLand !</h1>
        <h1 class="white h-secondary">Choose Your Subject</h1>
        <ul>

            <?php
              
                $sql = 'select * from quiz_category';
                $res = mysqli_query($result,$sql);
                while($row = mysqli_fetch_assoc($res)){
                    $item=$row['cat_name'];
                    echo '<li class="item"><a href="quiz.php?id='.$row['cat_id'].'&id2=1">'.$item.'</a></li>';
                }

                ?>
            
        </ul>
       
    </div>

    <script>

        document.querySelectorAll('.item').forEach(item =>
        {
            item.addEventListener('click',()=>
            {
                localStorage.clear();
            })
        })

    </script>

    
</body>
</html>
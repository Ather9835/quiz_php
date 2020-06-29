<?php
   include 'dir/connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@500&display=swap" rel="stylesheet">
    <title>Quiz</title>
    <style>
                a{
        text-decoration: none;
        color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="ques my-2">
             <?php
                $id = $_GET['id'];
                $id2 = $_GET['id2'];
                $sql = 'select * from ques_table where ques_cat_id ="'.$id.'" and no_cat_ques_id="'.$id2.'"';
                $res = mysqli_query($result,$sql);
                $row = mysqli_fetch_assoc($res);
                    $item=$row['ques_content'];
                    echo 'Q. '.$item.' ';
                ?>
        </div>
        <div class="ans">
        <?php
                $id1 = $row['ques_id'];
                $sql1 = 'select * from option_table where ques_id ="'.$id1.'" ';
                $res1 = mysqli_query($result,$sql1);
                $row1 = mysqli_fetch_assoc($res1);
                    echo '<div class="option opt" id="opt1">'.$row1['option_1'].'</div>
                    <div class="option opt" id="opt2">'.$row1['option_2'].'</div>
                    <div class="option opt" id="opt3">'.$row1['option_3'].'</div>
                    <div class="option opt" id="opt4">'.$row1['option_4'].'</div>';

                    echo '<div class="hidden">'.$row1['option_ans'].'</div>';
                    $id2 = $id2+1;
                ?>


            <!-- <div class="option">option1</div>
            <div class="option">option2</div>
            <div class="option">option3</div>
            <div class="option">option4</div> -->
            
        </div>
       
    </div>
    <div class="submit my-2">
        <button class="btn" id="nxt"><a <?php echo 'href="quiz.php?id='.$id.'&id2='.$id2.'"'; ?> >Next</a></button>
    </div>

    <div class="score btn">Score : <span id="scr"></span></div>

    <script>
          click = 1;
          function update(){
          document.getElementById('scr').innerHTML = score;}

        if(localStorage.getItem('Score') == null){

            score = 0;
        }
        else{
            score = JSON.parse(localStorage.getItem('Score'));
        }
        update();
        
        options1 = document.querySelector('#opt1');
        options2 = document.querySelector('#opt2');
        options3 = document.querySelector('#opt3');
        options4 = document.querySelector('#opt4');
        ans = document.querySelector('.hidden');
        options1.addEventListener('click',()=>{

            if(click==1){
             click = 0;
            if(ans.innerText === options1.innerText)
            {
                options1.classList.add('green');
                score = score + 1;
                update();
                
        localStorage.setItem('Score',JSON.stringify(score));
            }
            else{
                options1.classList.add('red');
                if(ans.innerText === options2.innerText)
            {
                options2.classList.add('green');
                
               }
            
           
                if(ans.innerText === options3.innerText)
            {
                options3.classList.add('green');
                
               }
            
            
                if(ans.innerText === options4.innerText)
            {
                options4.classList.add('green');
                
               }
            
        }
            }
            else{

                alert('Go to next Question');
            }
        })
        options2.addEventListener('click',()=>{

            if(click==1){
             click = 0;

            
            if(ans.innerText === options2.innerText)
            {
                options2.classList.add('green');
                score = score + 1;
                update();
        localStorage.setItem('Score',JSON.stringify(score));
            }
            else{
                options2.classList.add('red');
                if(ans.innerText === options1.innerText)
            {
                options1.classList.add('green');
                
               }
            
           
                if(ans.innerText === options3.innerText)
            {
                options3.classList.add('green');
                
               }
            
            
                if(ans.innerText === options4.innerText)
            {
                options4.classList.add('green');
                
               }
            }
        }
            else{

                alert('Go to next Question');
            }
        })
        options3.addEventListener('click',()=>{

            if(click==1){
             click = 0;
            if(ans.innerText === options3.innerText)
            {
                options3.classList.add('green');
                score = score + 1;
                update();
        localStorage.setItem('Score',JSON.stringify(score));
            }
            else{
                options3.classList.add('red');
                if(ans.innerText === options1.innerText)
            {
                options1.classList.add('green');
                
               }
            
           
                if(ans.innerText === options2.innerText)
            {
                options2.classList.add('green');
                
               }
            
            
                if(ans.innerText === options4.innerText)
            {
                options4.classList.add('green');
                
               }
            }
        }
            else{

                alert('Go to next Question');
            }
        })
            options4.addEventListener('click',()=>{
            
                if(click==1){
             click = 0;
                
            if(ans.innerText === options4.innerText)
            {
                options4.classList.add('green');
                score = score + 1;
                update();
        localStorage.setItem('Score',JSON.stringify(score));
            }
            else{
                options4.classList.add('red');
                if(ans.innerText === options1.innerText)
            {
                options1.classList.add('green');
                
               }
            
           
                if(ans.innerText === options2.innerText)
            {
                options2.classList.add('green');
                
               }
            
            
                if(ans.innerText === options3.innerText)
            {
                options3.classList.add('green');
                
               }
            }
                


            }
            else{

                alert('Go to next Question');
            }

            })


        
         
    </script>
    
</body>
</html>
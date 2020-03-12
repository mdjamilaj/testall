<style>
    body{
        font-family: 'Roboto', sans-serif;
    }
    .container{
        width: 80%;
        margin: auto;
        padding: 20px 0px;
    }
    .type_notice {
        text-align: center;
        padding: 5px;
        margin: 0px;
        width: 100px;
        margin: auto;
        border-bottom-style: double;
        font-family: 'Lobster', cursive;
        letter-spacing: 3px;
        /* border-bottom: 1px solid; */
        margin-bottom: 15px;
    }
    .title_english{
        text-align: center;
        padding: 1px;
        padding-bottom: 0px;
        margin: 0;
        word-spacing: 2px;
        letter-spacing: 1px;
    }
    .title_bangla {
    text-align: center;
    padding: 7px 0px;
    margin: 0;
    }
    .des_bangla{
        margin-top: 30px;
        margin-bottom: 15px;
    }
    .creator_side{
        float: left;
        text-align: left;
    }
    .creator_side h4{
        margin: 0;
        font-weight: 300;
        font-family: serif;
    }
    .creator_side h5{
        text-align: center;
        margin: 0;
        margin-top: 5px;
    }
    .date_side{
        float: right;
        text-align: right
    }

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto&display=swap" rel="stylesheet">
</head>
<body>
<!-- onload="window.print()" -->
    <div class="container">
        <h2 class="type_notice">Notice </h2>
        <h4 class="title_english"><?php echo $notice_info['title_english'] ?></h4>
        <h4 class="title_bangla"><?php echo $notice_info['title_bangla'] ?></h4>

        <div>
            <p class="des_bangla"><?php echo $notice_info['des_english'] ?></p>
            <p><?php echo $notice_info['des_bangla'] ?></p>
        </div>

        <div style="margin-top:40px;">
            <div class="creator_side">
                <h4>Name Of Creator</h4>
                <h5><?php echo $notice_info['creator'] ?></h5>
            </div>
            <div class="date_side">
            <h5>Date : <?php echo $notice_info['notice_date'] ?></h5>
            </div>
        </div>

    </div>
</body>
</html>

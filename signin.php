<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once("templates/footer.php");?>

    <div class="form">
        <forms action="" class="form">
        
            <label for="FN"> Fullname : </label><br>
            <input type = "text" id= "FN" placeholder=" Enter Fullname"><br><br>
            <label for="Eaddress">Email Address : </Address></label><br>
            <input type = "text" id= "Eaddress" placeholder="Enter your Email Address"><br><br>


            <label for="sb">Subject:</label><br>
            <select name="" id="sb">
                <option value="">---Select Subject-</option>
                <option value="1">Password Support</option>
                <option value="2"> Mpesa Support</option>
                <option value="3">FAQs Support</option>
                <option value="4">Other</option><br><br>
            </select><br><br>
            <label for="ms">Message:</label><br><br>
            <textarea cols="30" rows="7" name="message" id="ms"></textarea><br><br>
    
            <input type="submit" value="Send Message">
</body>
</html>
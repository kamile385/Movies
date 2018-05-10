<div class="info-container">
    <div class="info-main">
        <div class="register-container">
            <img src="public/images/user2.png" class="avatar">
            <h1>Register</h1>
            <!--<form action="login/run" method="post" role="form">-->
            <form action="controllers/register.php" method="post" role="form">
                <p>Name</p>
                <input type="text" name="name" placeholder="Enter Name"><br />
                <p>Surname</p>
                <input type="text" name="surname" placeholder="Enter Surname"><br />
                <p>Email</p>
                <input type="email" name="email" placeholder="example@example.com"><br />
                <p>Telephone number</p>
                <input type="text" name="telephone" placeholder="+37060000000" size="12" minlength="9" maxlength="14"><br />                
                <p>Username</p>
                <input type="tel" name="username" placeholder="Enter Username"/><br />
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password"/><br />
                <p>Repeat password</p>
                <input type="password" name="password" placeholder="Repeat Password"/><br />
                <input type="submit" name="submit" value="Register"/>
            </form>
        </div>
        
    </div>
</div>

<!--nepamirst required-->
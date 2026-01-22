<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="../../css/changePass.css">
</head>
<body>

    <form action="../../../controller/recValidation.php" method="POST">
        <h2 style="color: #008000; text-align: center; margin-top: 0;">Security</h2>
        
        <label>Current Password</label>
        <input type="password" id="currentPass" name="currentPass" required>
        
        <label>New Password</label>
        <input type="password" id="newPass" name="newPass" required>
        
        <button type="submit" id="updatePassword" name="updatePassword">Update Password</button>
        
        <a href="../dashboard/settings.php" class="back-link">Cancel</a>
    </form>

</body>
</html>
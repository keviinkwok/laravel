<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
</head>

<body>

    <h1>Buat Account Baru!</h1>
    <h3>Sign Up Form</h3>

    <form action="{{ url('/welcome') }}" method="POST">
        @csrf
        <!-- Form isi nama -->
        <label for="fname">First name:</label><br><br>
        <input type="text" id="fname" name="fname"><br><br>
        <label for="lname">Last name:</label><br><br>
        <input type="text" id="lname" name="lname"><br><br>

        <!-- Form isi gender -->
        <label for="gender">Gender:</label><br><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>

        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>

        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label><br><br>

        <!-- Form isi Nationality -->
        <label for="nationality">Nationality:</label><br><br>
        <select name="nationality" id="nationality">
            <option value="indonesian">Indonesian</option>
            <option value="japanese">Japanese</option>
            <option value="english">English</option>
            <option value="russian">Russian</option>
        </select><br><br>

        <!-- Form isi Language Spoken -->
        <label for="language">Language Spoken:</label><br><br>
        <input type="checkbox" id="lang1" name="lang1" value="Indonesian">
        <label for="lang1"> Bahasa Indoensia</label><br>

        <input type="checkbox" id="lang2" name="lang2" value="English">
        <label for="lang2"> English</label><br>

        <input type="checkbox" id="lang3" name="lang3" value="Other">
        <label for="lang3"> Other</label><br><br>

        <!-- Form isi Bio -->
        <label for="bio">Bio:</label><br><br>
        <textarea id="bio" name="bio" rows="7" cols="25"> </textarea><br>

        <!-- Button -->
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
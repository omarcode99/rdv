<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('https://merriam-webster.com/assets/mw/images/article/art-wap-landing-mp-lg/alt-5ae892611bf1a-5168-1472832016f2509f3889266323039a33@1x.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
#example1 {
  border-radius: 20px;
  padding: 100px;
  box-shadow: 5px 10px 8px #888888;
  width: 700px;
  margin-left: 550px;
  padding-top:10px ;
  
}
h3 {
  text-align: center;
  padding-bottom: 1em;
}

.button {
 display:inline-block;
padding:0.3em 1.2em;
padding-top:40px ;
padding-left: 70px ;
padding-right: 70px ;
margin:0 0.1em 0.1em 0;
border:0.16em solid rgb(106, 90, 205);
margin-left: 140px;
border-radius:2em;
box-sizing: border-box;
text-decoration:none;
font-family:'Roboto',sans-serif;
font-weight:300;
color:blue;
text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);
text-align:center;
transition: all 0.2s;

}
</style>
</head>
<body>
<form method ="post" action="index1.php">
<div class="header">
  <a  class="logo">YOU ARE WELCOME HERE</a>
  <div class="header-right">
    <a class="active" href="rdv.php">Home</a>
    <a href="https://www.pagesjaunes.fr/pagesblanches/r/mohamed.faid">Contact</a>
    <a href="https://competences.imist.ma/CVdetails.htm?idCompetence=426">About</a>
  </div>
</div>

<div style="padding-left:20px">
  <h1> Doctor Mohamed Faid </h1>
  <p>This site is created for making medical appointment at doctor faid .</p>
  <p>Take your chance with us .</p>
</div>
 <br> 
 <br>
<div id="example1">
<h3>Please click here to make your appointment </h3>
<br>
<br>
<button class="button" name = "submit" type = "submit" > <h3>Here we go</h3> </button>
</div>
</form>
</body>
</html>
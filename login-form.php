<?php

header("Content-type: text/css");

?>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
*
{
  margin: 0px;
  padding: 0px;
}
body
{
  background-color:#FFFFFF;
}
div.container
{
  display:flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}
.header_seo
{
  font-family: 'Roboto', sans-serif;
  text-align: center;
font-weight: bolder;
    font-size: 40px;
}
div.login , div.message
{

  padding:60px 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-family: 'Roboto', sans-serif;
  text-align: center;
  margin:50px center;
  min-width:600px;
}
.smaller{
  max-width: 440px;
}
div.login
{
  box-shadow: 10px 10px 5px #aaaaaa;
  border-radius: 20px;
  background-color:#F2F2F2;
    min-width:440px;
}
div.message h1
{
  line-height: 60px;
  font-size:40px;
}
div.message p
{
  font-size:20px;
}
div.message img
{
  width:220px;
}
input
{
  margin-bottom: 20px;
  display:block;
  font-size:26px;
  padding: 10px 30px;
  letter-spacing: 3px;
  font-family: Arial, Helvetica, sans-serif;
  font-weight:400;
  border:1px solid #989898;
  border-radius: 50px;
  width:240px;
  outline:none;
  font-family: 'Roboto', sans-serif;
}
::placeholder
{
  border-radius: 50px;
  color:#989898;
}
button
{
  margin-bottom: 20px;
  display:block;
  font-size:26px;
  padding: 10px 30px;
  letter-spacing: 3px;
  font-family: Arial, Helvetica, sans-serif;
  font-weight:400;
  border:none;
  border-radius: 50px;
  width:302px;
  outline:none;
  background-color: #181818;
  font-weight: bolder;
  color:white;
  letter-spacing: 5px;
  font-family: 'Roboto', sans-serif;
  cursor: pointer;
}
#back
{
  position:absolute;
  top:40px;
  left:40px;
  font-size:40px;
  color:black;
}
.success-cont
{
  position: absolute;
  top:0px;
  left:0px;
  display:none;
  background-color: rgba(255,255,255,0.8);
  height: 100%;
  width: 100%;
}
.success
{
  position: absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  text-align: center;
  width: 520px;
  padding:40px;
  background-color: #181818;
  font-weight: bolder;
  color:white;
  font-family: 'Roboto', sans-serif;
    border-radius: 20px;
}
.success h1
{
  margin-top: 20px;
  font-size: 40px;
  margin-bottom: 10px;
}
.success p
{
  font-size:16px;
  font-weight: normal;
}
.success .close
{
  position:relative;
}
.close i
{
  cursor:pointer;
  position: absolute;
  right:0px;
  top:10px;
  font-size: 30px;
}
#back
{
  position:absolute;
  top:40px;
  left:40px;
  font-size:40px;
  color:black;
}
input:valid
{
  border:3px solid green;
}

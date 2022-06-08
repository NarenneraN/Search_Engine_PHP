<?php

header("Content-type: text/css");

?>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body{
  position: relative;
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(-45deg, #8e9eab, #eef2f3, #70e1f5, #ffd194);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: 100vh;
}
@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

.page{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items:center;
  gap:30px;

}
.Full_Page
{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width:100%;
}
.search_logo
{
  display: flex;
  justify-content: center;
  align-items:center;
  z-index: 1;
}
.search_logo img{
  width:40%;
}
/* Search box */
.box{
  max-width: 400px;
  width: 100%;

}
.box .search-box{
  position: relative;
  height: 50px;
  max-width: 50px;
  margin: auto;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.25);
  border-radius: 25px;
  transition: all 0.3s ease;
}
#check:checked ~ .search-box{
  max-width: 380px;
}
.search-box input{
 position: absolute;
 height: 100%;
 width: 100%;
 border-radius: 25px;
 background: #fff;
 outline: none;
 border: none;
 padding-left: 20px;
 font-size: 18px;
}
.search-box .icon{
  position: absolute;
  right: -2px;
  top: 0;
  width: 50px;
  background: #FFF;
  height: 100%;
  text-align: center;
  line-height: 50px;
  color: rgb(40,46,62);
  font-size: 20px;
  border-radius: 25px;
}
#check:checked ~ .search-box .icon{
  background: rgb(40,46,62);
  color: #FFF;
  width: 60px;
  border-radius: 0 25px 25px 0;
}
#check{
  display: none;
}

/* Check boxes CSS */
h1 {
  margin: 16px 0;
  border-left: 5px solid rgb(40,46,62);
  padding-left: 16px;
}
.block_cont
{
  min-width: 100%;
display: flex;
flex-direction: row;
justify-content:center;
align-items: center;
}


.container .group {
  padding: 8px 48px;
  margin: 8px;
}

.container input[type="checkbox"] {
 display: none;
}
.container label {
  position: relative;
}

.container label::before {
  content: "";
  background: url("check-circle.svg");
  background-position: center;
  background-size: contain;
  width: 32px;
  height: 32px;
  position: absolute;
  left: -44px;
  top: -8px;

  transform: scale(0) rotateZ(180deg);
  transition: all 0.4s cubic-bezier(0.54, 0.01, 0, 1.49);
}

.container input[type="checkbox"]:checked + label::before {
  transform: scale(1) rotateZ(0deg);
}

.container label::after {
  content: "";
  border: 2px solid #27ae60;
  width: 24px;
  height: 24px;
  position: absolute;
  left: -42px;
  top: -6px;
  border-radius: 50%;
}

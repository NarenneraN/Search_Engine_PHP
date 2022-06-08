<?php

header("Content-type: text/css");

?>
/* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  display: flex;
  flex-direction:column;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: linear-gradient(135deg, #FDC830, #F37335);
}
.page{
  display:flex;
  flex-direction:row;
  justify-content:center;
  align-items:center;
  gap:100px;
}
.upload_details
{
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  background-color:white;
  border-radius:10px;
  min_width:400px;
  padding:40px;
}
::selection{
  color: #fff;
  background: #6990F2;
}
.wrapper{
  min-width: 430px;
  background: #fff;
  border-radius: 5px;
  padding: 30px;
  box-shadow: 7px 7px 12px rgba(0,0,0,0.05);
}
.wrapper header{
  color: #F37335;
  font-size: 27px;
  font-weight: 600;
  text-align: center;
}
.wrapper form{
  height: 167px;
  display: flex;
  cursor: pointer;
  margin: 30px 0;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  border-radius: 5px;
  border: 2px solid #FDC830;
}
form :where(i, p){
  color: #FDC830;
}
form i{
  font-size: 50px;
}
form p{
  margin-top: 15px;
  font-size: 16px;
}

section .row{
  margin-bottom: 10px;
  background: #E9F0FF;
  list-style: none;
  padding: 15px 20px;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
section .row i{
  color: #6990F2;
  font-size: 30px;
}
section .details1 span{
  font-size: 14px;
}
.progress-area .row .content{
  width: 100%;
  margin-left: 15px;
}
.progress-area .details1{
  display: flex;
  align-items: center;
  margin-bottom: 7px;
  justify-content: space-between;
}
.progress-area .content .progress-bar{
  height: 6px;
  width: 100%;
  margin-bottom: 4px;
  background: #fff;
  border-radius: 30px;
}
.content .progress-bar .progress{
  height: 100%;
  width: 0%;
  background: #6990F2;
  border-radius: inherit;
}
.uploaded-area{
  max-height: 232px;
  overflow-y: scroll;
}
.uploaded-area.onprogress{
  max-height: 150px;
}
.uploaded-area::-webkit-scrollbar{
  width: 0px;
}
.uploaded-area .row .content{
  display: flex;
  align-items: center;
}
.uploaded-area .row .details1{
  display: flex;
  margin-left: 15px;
  flex-direction: column;
}
.uploaded-area .row .details1 .size{
  color: #404040;
  font-size: 11px;
}
.uploaded-area i.fa-check{
  font-size: 16px;
}
.button{
  height: 45px;
  margin: 35px 0;
  min-width:440px;
}
.button input{
  height: 100%;
  width: 100%;
  border-radius: 5px;
  border: none;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  letter-spacing: 1px;
  cursor: pointer;
  transition: all 0.3s ease;
  background-color: #181818;
}
.button input:hover{
 /* transform: scale(0.99); */
 background: linear-gradient(-135deg, #fdc830, #f37335);
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

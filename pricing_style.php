<?php

header("Content-type: text/css");

?>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: linear-gradient(#fc4a1a 0%, #f7b733 100%);
}
.wrapper{
  width: 400px;
  background: #fff;
  border-radius: 16px;
  padding: 30px;
  box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
}
.wrapper header{
  height: 55px;
  display: flex;
  align-items: center;
  border: 1px solid #ccc;
  border-radius: 30px;
  position: relative;
}
header label{
  height: 100%;
  z-index: 2;
  width: 30%;
  display: flex;
  cursor: pointer;
  font-size: 18px;
  position: relative;
  align-items: center;
  justify-content: center;
  transition: color 0.3s ease;
}
#tab-1:checked ~ header .tab-1,
#tab-2:checked ~ header .tab-2,
#tab-3:checked ~ header .tab-3{
  color: #fff;
}
header label:nth-child(2){
  width: 40%;
}
header .slider{
  position: absolute;
  height: 85%;
  border-radius: inherit;
    background: linear-gradient(#fc4a1a 0%, #f7b733 100%);
  transition: all 0.3s ease;
}
#tab-1:checked ~ header .slider{
  left: 0%;
  width: 90px;
  transform: translateX(5%);
}
#tab-2:checked ~ header .slider{
  left: 50%;
  width: 120px;
  transform: translateX(-50%);
}
#tab-3:checked ~ header .slider{
  left: 100%;
  width: 95px;
  transform: translateX(-105%);
}
.wrapper input[type="radio"]{
  display: none;
}
.card-area{
  overflow: hidden;
}
.card-area .cards{
  display: flex;
  width: 300%;
}
.cards .row{
  width: 33.4%;
}
.cards .row-1{
  transition: all 0.3s ease;
}
#tab-1:checked ~ .card-area .cards .row-1{
   margin-left: 0%;
}
#tab-2:checked ~ .card-area .cards .row-1{
  margin-left: -33.4%;
}
#tab-3:checked ~ .card-area .cards .row-1{
   margin-left: -66.8%;
}
.row .price-details{
  margin: 20px 0;
  text-align: center;
  padding-bottom: 25px;
  border-bottom: 1px solid #e6e6e6;
}
.price-details .price{
  font-size: 65px;
  font-weight: 600;
  position: relative;
  font-family: 'Noto Sans', sans-serif;
}
.price-details .price::before,
.price-details .price::after{
  position: absolute;
  font-weight: 400;
  font-family: "Poppins", sans-serif;
}
.price-details .price::before{
  content: "₹";
  left: -13px;
  top: 17px;
  font-size: 20px;
}
.price-details .price::after{
  content: "/year";
  right: -33px;
  bottom: 17px;
  font-size: 13px;
}
.price-details p{
  font-size: 18px;
  margin-top: 5px;
}
.row .features li{
  display: flex;
  font-size: 15px;
  list-style: none;
  margin-bottom: 10px;
  align-items: center;
}
.features li i{
  background: linear-gradient(#fc4a1a 0%, #f7b733 100%);
  background-clip: text;
 -webkit-background-clip: text;
 -webkit-text-fill-color: transparent;
}
.features li span{
  margin-left: 10px;
}
.wrapper button,form input{
  width: 100%;
  border-radius: 25px;
  border: none;
  outline: none;
  height: 50px;
  font-size: 18px;
  color: #fff;
  cursor: pointer;
  margin-top: 20px;
  background: linear-gradient(#fc4a1a 0%, #f7b733 100%);
  transition: transform 0.3s ease;
}
.wrapper button:hover{
  transform: scale(0.98);
}

/*Modal*/

.modal{
   background-color: rgba(0,0,0, .8);
   width:100%;
   height: 100vh;
   position: absolute;
   top: 0;
   left: 0;
   z-index: 10;
   opacity: 0;
   visibility: hidden;
   transition: all .5s;
  }

  .modal__content{
   width: 50%;
   height: 90%;
   background-color: #fff;
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   padding: 2em;
   border-radius: 1em;
   opacity: 0;
   visibility: hidden;
   transition: all .5s;
  }

  #modal:target{
   opacity: 1;
   visibility: visible;
  }

  #modal:target .modal__content{
   opacity: 1;
   visibility: visible;
  }

  .modal__close{
   color: #363636;
   font-size: 2em;
   position: absolute;
   top: .5em;
   right: 1em;
  }

  .modal__heading{
   color: dodgerblue;
   margin-bottom: 1em;
  }

  .modal__paragraph{
   line-height: 1.5em;
  }

.modal-open{
 display: inline-block;
 color: dodgerblue;
 margin: 2em;
}


/*Payment*/

.payment_container {
  margin-top: 30px;
  background-color: #e4e1ea;
  border-radius: 10px;
  width: 700px;
  color: #160647;
  font-weight: bolder;
  font-size: 18px;
  font-family: 'Raleway', sans-serif;
}

hr {
  color: rgba(0, 0, 0, 0.6);
  width: 100%;
  text-align: center;
  height: 2px;
}

.payment_header {
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  background-color: #FF9C7A;
  color: white;
  margin: 0;
  font-size: 26px;
  padding: 15px 30px;
  text-align: center;
  font-family: 'Raleway', sans-serif;
}

label {
  display: block;
}

.payment_inputs {
  padding: 10px 30px;
}

.division_input {
  flex: 1;
}

input, select {
  width: 100%;
  background-color: transparent;
  font-size: 16px;
  padding: 2px 5px;
  letter-spacing: 3px;
  font-weight: 400;
  border: 1.5px solid rgba(24, 24, 24, 0.7);
  border-radius: 3px;
  font-family: 'Raleway', sans-serif;
}

.top_inp_pay, .down_inp_pay,.bott_inp_pay {
  display: flex;
  flex-direction: row;
  gap: 50px;
  margin: 20px 5px;
}

.order_summary {
  background-color: #e4e1ea;
  padding: 20px;
  padding-top: 10px;
  border-radius: 4px;
  width: 350px;
  font-family: 'Raleway', sans-serif;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  border-radius: 10px;
}

.order_summary .order_header {
  color: #160647;
  font-weight: bolder;
  font-size: 28px;
  text-align: center;
}

.total_payment_container {
  display: flex;
}

.total_payment_container p {
  margin: 0;
  font-size: 20px;
  font-weight: bolder;
  letter-spacing: 2.3px;
}

.payment_total_price {
  margin-left: auto !important;
  font-size: 24px !important;
}

.payment_div {
  display: none;
  position: absolute;
  top: 0px;
  left: 0px;
  z-index: 1;
  background-color: white;
  min-height: 100%;
  width: 100%;
}

.order_payment_button_div
{
  margin-top:15px;
}
#order_payment_button {
  width: 60%;
  text-align: center;
  padding: 4px 15px;
  color: white;
  background-color: #1B86F5;
  font-weight: bold;
  font-size: 22px;
  border: 2px solid #1B86F5;
  font-family: 'Raleway', sans-serif;
  outline: none;
  border-radius: 20px;
  transition: all 0.3s ease-in-out;
  cursor:pointer;
}

#order_payment_button:hover {
  background-color: transparent;
  color: black;
  border: 2px solid #181818;
}

<?= view('template_header'); ?>
<style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat");
* {
  margin: 0;
  padding: 0;

}

body {
    font-family: 'Montserrat';
  font-weight: 100;
  font-size: 22px;
  line-height: 30px;
  color: #777;

}

.container {
  max-width: 650px;
  width: 100%;
  margin: 0 auto;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font-size: 16px !important;
  font-weight: 600;
  font-family: 'Montserrat';
  border-radius: 10px;
  
}

#contact {
  background: #F9F9F9;
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  font-size: 20px;
  color: black !important;
  font-weight: 600;
  margin-bottom: 10px;
  align-items: center;
  justify-content: center;
  justify-items: center;
  text-align: center;

}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}


#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #600027;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 16px;
  font-family: 'Montserrat';
}

#contact button[type="submit"]:hover {
  background: #600027;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}



::-webkit-input-placeholder {
  color: #62666A;
}

:-moz-placeholder {
  color: #62666A;
}

::-moz-placeholder {
  color: #62666A;
}

:-ms-input-placeholder {
  color: #62666A;
}
.container{
    margin-top: 10px !important;
}
</style>
<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Agregar componente</h3>
    <fieldset>
      <input placeholder="Clave del componente" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Nombre del componente" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Monto ($)" type="tel" tabindex="3" required>
    </fieldset>
   
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>

<?= view('template_footer'); ?>
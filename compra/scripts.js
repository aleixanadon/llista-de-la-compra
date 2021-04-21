
     function isEmpty() {
          var item = document.getElementById('item').value;
          var stock = document.getElementById('stock').value;

          if (item == "" || stock == "") {
               alert('Los campos no pueden estar vacíos');
               console.log("Los campos no pueden estar vacíos");
          }
     }

<script type="text/javascript">
      
      $(document).ready(function() {
          $('#addDishForm').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            
            fields: {
              addDishName: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z]+([\s][a-zA-Z]+)*$/,
                    message: 'This can only consist of alphabetical letters only.'
                  },
                  remote:{
                    url:'checkdishname.php',
                    message:'This Dish is already existing'
                  },
                  notEmpty: {
                    message: 'Please supply the dish name.'
                  },
                  stringLength: {
                    min: 5,
                    max: 50,
                    message: 'The system allows 5 to 50 characters only.'

                  }
                }
              },
        
              addDishPrice: {
                validators: {
                  regexp: {
                    regexp: /^[1-9(0).]+$/,
                    message: 'This can only consist of numeric only.'
                  },
                  notEmpty: {
                    message: 'Please supply the dish price.'
                  },
                  stringLength: {
                    min: 1,
                    max: 5,
                    message: 'The system allows realistic prices.'

                  }
                }
              },
        
              addDishDesc: {
                validators: {
                  notEmpty: {
                    message: 'Please supply the dish description.'
                  },
                  stringLength: {
                    min: 50,
                    max: 200,
                    message: 'The system allows 50 to 200 characters only.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([\s][a-zA-Z0-9-()]+)*$/,
                    message: 'This can only consist of alphabetical letters only.'
                  },
                }
              },
            }
          })
        });





    </script>
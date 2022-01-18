var mongoose = require('mongoose');




var options = {
    connectTimeoutMS: 5000,
    useNewUrlParser: true,
   
        useUnifiedTopology : true
   }



mongoose.connect("mongodb+srv://kv1k:IRC@cluster0.13cz2.mongodb.net/myFirstDatabase?retryWrites=true&w=majority",
   options,
   function(err) {
    if (err) {
      console.log(`error, failed to connect to the database because --> ${err}`);
    } else {
      console.info('*** Database IRC connection : Success ***');
    }
   }
);

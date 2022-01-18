var mongoose = require('mongoose');


var msgSchema = mongoose.Schema({
   message: String,
   roomId: [{type: mongoose.Schema.Types.ObjectId, ref:"room"}],
});
  
var msgModel = mongoose.model('messages', msgSchema);

module.exports = msgModel
var mongoose = require('mongoose');

var roomSchema = mongoose.Schema({
   nameOfRoom: String,
});
  
var roomModel = mongoose.model('room', roomSchema);

module.exports = roomModel
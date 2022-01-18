var express = require('express');
var router = express.Router();


/* GET home page. */
router.get('/', function(req, res) {
  res.render('index', { title: 'Express' });
});



// router.get('/list', async function (req, res){
//   var rooms= await roomModel.find()
//   res.json({rooms})
// });
// router.post('/create', async function (req, res){

//   var searchRoom = await roomModel.findOne({
//     nameOfRoom: req.body.nameOfRoom,
//   })
  
//   if(!searchRoom){
//     var newRoom = new roomModel({
//       userId: [req.body.id],
//       nameOfRoom: req.body.nameOfRoom
//     });

//     var newRoom = await newRoom.save();
//   }

//   else{
//     res.redirect('/');
//   }
// });
// router.get('/delete', async function (req, res){

//   var room = await roomModel.findOne(req.query.idRoom)
  
//   if(room){
//    room.remove().exec();
//   }

//   else{
//     res.redirect('/');
//   }
// });
// router.post('/join', async function (req, res){

//   var room = await roomModel.findById(req.body.idRoom);
//   var searchUser = await roomModel.findOne({
//     users: req.body.userName,
//   })
  
//   if(room && searchUser ===false){
//     room.users.push(req.body.userName);
//     var userSaved = await room.save();
//   }

//   else{
//     console.log(`Erreur: channel n'existe pas`)
//     res.redirect('/');
//   }
// });


// router.get('/users', async function (req, res){

//   var room = await roomModel.findById(req.body.idRoom);
  
  
//   if(room){
//     res.json(rooms.users)
//   }

//   else{
//     console.log(`Erreur: channel n'existe pas`)
//     res.redirect('/');
//   }
// });

// router.post('/newMessage', async function (req,res){
//   var newMessage = new userModel({
//     nickname: req.body.nickname,
//   });

//   var newUser = await newUser.save();

// });

module.exports = router;

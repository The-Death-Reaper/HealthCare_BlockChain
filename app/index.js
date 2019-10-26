const express = require('express');
const bodyParser = require('body-parser');
const Blockchain = require('../blockchain');
const P2pServer = require('./p2p-server');
//console.log(typeof(process.argv));
let HTTP_PORT;
if(process.argv.length!=2)
{
    HTTP_PORT = process.argv[2].split('=')[1];
}

else{
    HTTP_PORT = 3001;
}

//const HTTP_PORT = process.argv[2].split('=')[1] || 3001;

//$ HTTP_PORT=3002 npm run dev

const app = express();
const bc = new Blockchain();
const p2pServer = new P2pServer(bc);
app.use(bodyParser.json());

app.get('/blocks',(req,res)=>{
    res.json(bc.chain);
});

app.post('/mine',(req,res)=>{
    const block = bc.addBlock(req.body.data);
    console.log(`New Block added: ${block.toString()}`);

    res.redirect('/blocks');
})

app.listen(HTTP_PORT,()=>console.log(`Listening on port ${HTTP_PORT}`));
p2pServer.listen();
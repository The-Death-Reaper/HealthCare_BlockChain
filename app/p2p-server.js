const Websocket = require(  'ws');
//console.log(process.argv[3].split('=')[1]);
//console.log(process.argv.length);
let P2P_PORT;
let peers;

if(process.argv.length!=2)
{
    P2P_PORT = process.argv[3].split('=')[1];
}
else
{
    P2P_PORT = 5001;
}

if(process.argv.length!=2)
{
    peers = process.argv[4].split('=')[1].split(',');
}
else{
    peers = [];
}
//const P2P_PORT = process.argv[3].split('=')[1] || 5001;
//const peers = process.argv[4].split('=')[1] ? process.argv[4].split('=')[1].split(','):[];

//$ HTTP_PORT=3002 P2P_PORT = 5003 PEERS = ws://localhost:5001,ws://localhost:5002 npm run dev

class P2pServer
{
    constructor(blockchain)
    {
        this.blockchain = blockchain;
        this.sockets = [];
    }

    listen()
    {
        const server = new Websocket.Server({port:P2P_PORT});
        server.on('connection',socket=>this.connectSocket(socket));

        this.connectToPeers();
        console.log(`Listening for peer to peer connections on: ${P2P_PORT}`);

    }

    connectToPeers()
    {
        peers.forEach(peer=>{
            const socket = new Websocket(peer);

            socket.on('open',()=>this.connectSocket(socket));
        });
    }

    connectSocket(socket)
    {
        this.sockets.push(socket);
        console.log('Socket connected');
    }
}

module.exports = P2pServer;
/*const Block = require('./blockchain/block')
const block = new Block('t1','t2','t3','t4');
//console.log(block.toString());
//console.log(Block.genesis().toString());

const Block2 = Block.mineBlock(Block.genesis(),['maghu']);
console.log(Block2.toString());
*/

const Blockchain = require('./blockchain');

const bc = new Blockchain();

for(let i = 0;i<10;i++)
{
    console.log(bc.addBlock(`test ${i}`).toString());
}
const Blockchain = require('./index');
const Block = require('./block');

describe('Blockchain',()=>{
    let bc,bc2;

    beforeEach(()=>{
        bc = new Blockchain();
        bc2 = new Blockchain();
    });

    it('starts with genesis block',()=>{
        expect(bc.chain[0]).toEqual(Block.genesis());
    });

    it('adds a new block',()=>{
        const data = 'foo';
        bc.addBlock(data);

        expect(bc.chain[bc.chain.length-1].data).toEqual(data);
    });

    it('validates a valid chain',()=>{
        bc2.addBlock('test2');

        expect(bc.isValidChain(bc2.chain)).toBe(true);
    });

    it("invalidates a chain with a corrupt genesis block",()=>{
        bc2.chain[0].data = 'wrong data';

        expect(bc2.isValidChain(bc2.chain)).toBe(false);
    });

    it("invalidates a corrupt chain",()=>{
        bc2.addBlock('test');
        bc2.chain[1].data = 'ntest';

        expect(bc2.isValidChain(bc2.chain)).toBe(false);
    });

    it("replaces with a chain with a valid chain",()=>{
        bc2.addBlock('test4');
        bc.replaceChain(bc2.chain);

        expect(bc.chain).toEqual(bc2.chain);
    });

    it("does not replace if the chain is length is lesser or equal to the current chain",()=>{
        bc.addBlock('newt');
        bc.replaceChain(bc2.chain);

        expect(bc.chain).not.toEqual(bc2.chain);
    });
});
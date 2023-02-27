const Blockchain = require("./src/blockchain");
const Block = require("./src/block");

async function run(){
    const blockchain = new Blockchain();

    // Creamos nuevos bloques
    const block1 = new Block({data: "Block #1 Juan" });
    const block2 = new Block({data: "Block #2 Juan" });
    const block3 = new Block({data: "Block #3 Juan" });
    const block4 = new Block({data: "Block #4 Juan" });
    const block5 = new Block({data: "Block #5 Juan" });

    await blockchain.addBlock(block1);
    await blockchain.addBlock(block2);
    await blockchain.addBlock(block3);
    await blockchain.addBlock(block4);
    await blockchain.addBlock(block5);

    blockchain.print();
}

run();
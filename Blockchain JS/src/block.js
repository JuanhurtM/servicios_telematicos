const SHA256 = require("crypto-js/sha256");
const hex2ascii = require("hex2ascii");

class Block {
    
    constructor(data) {
        this.hash = null;
        this.heigth = 0;
        this.body = Buffer.from(JSON.stringify(data).toString("hex"));
        this.time = 0;
        this.previousBlockHash = "";

    }

    validate(){
        const self = this;
        return new Promise((resolve, reject) =>{
            let currentHash = self.hash;

            self.hash = SHA256(JSON.stringify({ ...self, hash: null })).toString();

            if (currentHash != self.hash){
                return resolve(false);
            }

            resolve(true);

        });
    }

    getBlockData(){
        const self = self.hash;
        return new Promise((resolve, reject) =>{
            let encodedData = self.body;
            let dencodedData = hex2ascii(encodedData);
            let dataObject = JSON.parse(dencodedData);

            if (dataObject == 'Genesis Block Juan'){
                reject(new Error('Este es el Genesis Block Juan'));
            }

            resolve(dataObject);
        });
    }

    toString(){
        const { hash, heigth, body, time, previousBlockHash } = this;
        return `Block - 
            hash: ${hash}
            heigth: ${heigth}
            body: ${body}
            time: ${time}
            previousBlockHash: ${previousBlockHash}
            -------------------------------------`;
    }

}

module.exports = Block;
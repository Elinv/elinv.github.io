// USO: console.log(exArray.twoDIndexOf('7'));
// console.log(A1.twoDIndexOf('fallo'));
Array.prototype.twoDIndexOf = function (element) {
    if (this === null || this === undefined)
        throw TypeError("Array.prototype.indexOf called on null or undefined");
    for (let i = 0; i < this.length; i++) {
        const curr = this[i];
        if (curr.includes(element)) return [i, curr.indexOf(element)];
    }
    return -1;
};



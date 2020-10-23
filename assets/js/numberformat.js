function number_format(n, d=0, p=".", t="") {
    n = Number(n);
    if( isNaN(n) )
    {
        d = (isNaN(d = Math.abs(d)) ? 0 : d);
        return (0).toFixed(d);
    }
    else {
        var isFloat = ((n % 1) !== 0);
        
        if( isFloat && d == "*" ) {
            d = String(n).split(".")[1].length;
        }
        else if( Number(d) >= 0 ) {
            d = Number(d);
        }
        else {
            d = String(n).split(".");
            if( d.length > 1 ) {
                d = d[1].length;
            }
            else {
                d = 0;
            }
        }
            
        d = (isNaN(d = Math.abs(d)) ? 2 : d); 
        p = (p === undefined ? "." : p); 
        t = (t === undefined ? "" : t);
        var s = n < 0 ? "-" : "";
        var i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(d)));
        var j = (j = i.length) > 3 ? j % 3 : 0;
        var ret = s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (d ? p + Math.abs(n - i).toFixed(d).slice(2) : "");
        return ret;
    }
}
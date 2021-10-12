/*kudos to : https://stackoverflow.com/users/80860/kennebec */
function get_browser() {
    var ua = navigator.userAgent, tem,
        M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if (/trident/i.test(M[1])) {
        tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
        return {name: 'IE', version: (tem[1] || '')};
    }
    if (M[1] === 'Chrome') {
        tem = ua.match(/\bOPR\/(\d+)/)
        if (tem != null) {
            return {name: 'Opera', version: tem[1]};
        }
    }
    if (window.navigator.userAgent.indexOf("Edge") > -1) {
        tem = ua.match(/\Edge\/(\d+)/)
        if (tem != null) {
            return {name: 'Edge', version: tem[1]};
        }
    }
    M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
    if ((tem = ua.match(/version\/(\d+)/i)) != null) {
        M.splice(1, 1, tem[1]);
    }
    return {
        name: M[0],
        version: +M[1]
    };
}

var browser = get_browser()
var isSupported = isSupported(browser);
console.log(browser);

function isSupported(browser) {
    var supported = false;
    if (browser.name === "Chrome") {
        //&& browser.version >= 48
        supported = true;
    } /*else if ((browser.name === "MSIE" || browser.name === "IE") && browser.version <= 11) {
            supported = false;
        }*/
    else if (browser.name === "Edge") {
        supported = true;
    } else if (browser.name === "Opera") {
        supported = true;

    } else if (browser.name === "Firefox") {
        supported = true;
    }
    return supported;
}

if (!isSupported) {
    //render unsupported message
    document.write("<h1 style='color:red;text-align: center;'>The website is not supported in Your Browser. Please use other browsers! " +
        "We highly recommend you to use latest Chrome Browser</h1>");
    document.getElementById("pagecontainer").style.display = "none";
}

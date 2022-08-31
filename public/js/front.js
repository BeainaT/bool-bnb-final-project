/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/front.js":
/*!*******************************!*\
  !*** ./resources/js/front.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/resources/js/front.js: Identifier 'App' has already been declared. (6:6)\n\n\u001b[0m \u001b[90m 4 |\u001b[39m \u001b[36mimport\u001b[39m \u001b[33mApp\u001b[39m \u001b[36mfrom\u001b[39m \u001b[32m'./views/App.vue'\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 5 |\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 6 |\u001b[39m \u001b[36mconst\u001b[39m \u001b[33mApp\u001b[39m \u001b[33m=\u001b[39m \u001b[36mnew\u001b[39m \u001b[33mVue\u001b[39m({\u001b[0m\n\u001b[0m \u001b[90m   |\u001b[39m       \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 7 |\u001b[39m     el\u001b[33m:\u001b[39m \u001b[32m'#App'\u001b[39m\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 8 |\u001b[39m     render\u001b[33m:\u001b[39m h\u001b[33m=>\u001b[39m\u001b[32m'h(App)'\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 9 |\u001b[39m })\u001b[0m\n    at instantiate (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:72:32)\n    at constructor (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:366:12)\n    at Parser.raise (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:3453:19)\n    at ScopeHandler.checkRedeclarationInScope (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:3645:19)\n    at ScopeHandler.declareName (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:3611:12)\n    at Parser.declareNameFromIdentifier (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:12285:16)\n    at Parser.checkIdentifier (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:12280:12)\n    at Parser.checkLVal (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:12206:12)\n    at Parser.parseVarId (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:15533:10)\n    at Parser.parseVar (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:15507:12)\n    at Parser.parseVarStatement (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:15310:10)\n    at Parser.parseStatementContent (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:14852:21)\n    at Parser.parseStatement (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:14777:17)\n    at Parser.parseBlockOrModuleBlockBody (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:15420:25)\n    at Parser.parseBlockBody (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:15411:10)\n    at Parser.parseProgram (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:14695:10)\n    at Parser.parseTopLevel (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:14682:25)\n    at Parser.parse (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:16689:10)\n    at parse (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/parser/lib/index.js:16741:38)\n    at parser (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/core/lib/parser/index.js:52:34)\n    at parser.next (<anonymous>)\n    at normalizeFile (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/core/lib/transformation/normalize-file.js:87:38)\n    at normalizeFile.next (<anonymous>)\n    at run (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/core/lib/transformation/index.js:31:50)\n    at run.next (<anonymous>)\n    at Function.transform (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/@babel/core/lib/transform.js:25:41)\n    at transform.next (<anonymous>)\n    at step (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/gensync/index.js:261:32)\n    at /Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/gensync/index.js:273:13\n    at async.call.result.err.err (/Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/node_modules/gensync/index.js:223:11)");

/***/ }),

/***/ 1:
/*!*************************************!*\
  !*** multi ./resources/js/front.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/emanueleguidi/Desktop/BoolBnB-Team4/bool-bnb-final-project/resources/js/front.js */"./resources/js/front.js");


/***/ })

/******/ });
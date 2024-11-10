ace.define("ace/mode/tcl",["require","exports","module","ace/lib/oop","ace/mode/text","ace/tokenizer","ace/mode/folding/cstyle","ace/mode/tcl_highlight_rules","ace/mode/matching_brace_outdent","ace/range"],(function(e,t,n){var o=e("../lib/oop"),r=e("./text").Mode,i=e("../tokenizer").Tokenizer,a=e("./folding/cstyle").FoldMode,c=e("./tcl_highlight_rules").TclHighlightRules,g=e("./matching_brace_outdent").MatchingBraceOutdent,l=e("../range").Range,s=function(){this.$tokenizer=new i((new c).getRules()),this.$outdent=new g,this.foldingRules=new a};o.inherits(s,r),function(){this.toggleCommentLines=function(e,t,n,o){for(var r=!0,i=/^(\s*)#/,a=n;a<=o;a++)if(!i.test(t.getLine(a))){r=!1;break}if(r){var c=new l(0,0,0,0);for(a=n;a<=o;a++){var g=t.getLine(a).match(i);c.start.row=a,c.end.row=a,c.end.column=g[0].length,t.replace(c,g[1])}}else t.indentRows(n,o,"#")},this.getNextLineIndent=function(e,t,n){var o=this.$getIndent(t),r=this.$tokenizer.getLineTokens(t,e).tokens;if(r.length&&"comment"==r[r.length-1].type)return o;"start"==e&&(t.match(/^.*[\{\(\[]\s*$/)&&(o+=n));return o},this.checkOutdent=function(e,t,n){return this.$outdent.checkOutdent(t,n)},this.autoOutdent=function(e,t,n){this.$outdent.autoOutdent(t,n)}}.call(s.prototype),t.Mode=s})),ace.define("ace/mode/folding/cstyle",["require","exports","module","ace/lib/oop","ace/range","ace/mode/folding/fold_mode"],(function(e,t,n){var o=e("../../lib/oop"),r=(e("../../range").Range,e("./fold_mode").FoldMode),i=t.FoldMode=function(){};o.inherits(i,r),function(){this.foldingStartMarker=/(\{|\[)[^\}\]]*$|^\s*(\/\*)/,this.foldingStopMarker=/^[^\[\{]*(\}|\])|^[\s\*]*(\*\/)/,this.getFoldWidgetRange=function(e,t,n){var o,r=e.getLine(n);if(o=r.match(this.foldingStartMarker)){var i=o.index;return o[1]?this.openingBracketBlock(e,o[1],n,i):e.getCommentFoldRange(n,i+o[0].length,1)}if("markbeginend"===t&&(o=r.match(this.foldingStopMarker))){i=o.index+o[0].length;return o[1]?this.closingBracketBlock(e,o[1],n,i):e.getCommentFoldRange(n,i,-1)}}}.call(i.prototype)})),ace.define("ace/mode/tcl_highlight_rules",["require","exports","module","ace/lib/oop","ace/mode/text_highlight_rules"],(function(e,t,n){var o=e("../lib/oop"),r=e("./text_highlight_rules").TextHighlightRules,i=function(){this.$rules={start:[{token:"comment",regex:"#.*\\\\$",next:"commentfollow"},{token:"comment",regex:"#.*$"},{token:"support.function",regex:"[\\\\]$",next:"splitlineStart"},{token:"text",regex:'[\\\\](?:["]|[{]|[}]|[[]|[]]|[$]|[])'},{token:"text",regex:"^|[^{][;][^}]|[/\r/]",next:"commandItem"},{token:"string",regex:'[ ]*["](?:(?:\\\\.)|(?:[^"\\\\]))*?["]'},{token:"string",regex:'[ ]*["]',next:"qqstring"},{token:"variable.instancce",regex:"[$]",next:"variable"},{token:"support.function",regex:"!|\\$|%|&|\\*|\\-\\-|\\-|\\+\\+|\\+|~|===|==|=|!=|!==|<=|>=|<<=|>>=|>>>=|<>|<|>|!|&&|\\|\\||\\?\\:|\\*=|%=|\\+=|\\-=|&=|\\^=|{\\*}|;|::"},{token:"identifier",regex:"[a-zA-Z_$][a-zA-Z0-9_$]*\\b"},{token:"paren.lparen",regex:"[[{]",next:"commandItem"},{token:"paren.lparen",regex:"[(]"},{token:"paren.rparen",regex:"[\\])}]"},{token:"text",regex:"\\s+"}],commandItem:[{token:"comment",regex:"#.*\\\\$",next:"commentfollow"},{token:"comment",regex:"#.*$",next:"start"},{token:"string",regex:'[ ]*["](?:(?:\\\\.)|(?:[^"\\\\]))*?["]'},{token:"variable.instancce",regex:"[$]",next:"variable"},{token:"support.function",regex:"(?:[:][:])[a-zA-Z0-9_/]+(?:[:][:])",next:"commandItem"},{token:"support.function",regex:"[a-zA-Z0-9_/]+(?:[:][:])",next:"commandItem"},{token:"support.function",regex:"(?:[:][:])",next:"commandItem"},{token:"support.function",regex:"!|\\$|%|&|\\*|\\-\\-|\\-|\\+\\+|\\+|~|===|==|=|!=|!==|<=|>=|<<=|>>=|>>>=|<>|<|>|!|&&|\\|\\||\\?\\:|\\*=|%=|\\+=|\\-=|&=|\\^=|{\\*}|;|::"},{token:"keyword",regex:"[a-zA-Z0-9_/]+",next:"start"}],commentfollow:[{token:"comment",regex:".*\\\\$",next:"commentfollow"},{token:"comment",regex:".+",next:"start"}],splitlineStart:[{token:"text",regex:"^.",next:"start"}],variable:[{token:"variable.instance",regex:"(?:[:][:])?[a-zA-Z_\\d]+(?:(?:[:][:])?[a-zA-Z_\\d]+)?(?:[(][a-zA-Z_\\d]+[)])?",next:"start"},{token:"variable.instance",regex:"[a-zA-Z_\\d]+(?:[(][a-zA-Z_\\d]+[)])?",next:"start"},{token:"variable.instance",regex:"{?[a-zA-Z_\\d]+}?",next:"start"}],qqstring:[{token:"string",regex:'(?:[^\\\\]|\\\\.)*?["]',next:"start"},{token:"string",regex:".+"}]}};o.inherits(i,r),t.TclHighlightRules=i})),ace.define("ace/mode/matching_brace_outdent",["require","exports","module","ace/range"],(function(e,t,n){var o=e("../range").Range,r=function(){};(function(){this.checkOutdent=function(e,t){return!!/^\s+$/.test(e)&&/^\s*\}/.test(t)},this.autoOutdent=function(e,t){var n=e.getLine(t).match(/^(\s*\})/);if(!n)return 0;var r=n[1].length,i=e.findMatchingBracket({row:t,column:r});if(!i||i.row==t)return 0;var a=this.$getIndent(e.getLine(i.row));e.replace(new o(t,0,t,r-1),a)},this.$getIndent=function(e){var t=e.match(/^(\s+)/);return t?t[1]:""}}).call(r.prototype),t.MatchingBraceOutdent=r}));

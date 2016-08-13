﻿VirtualKeyboard.addLayout({code:'EM-ET',name:'Ethiopic  Pan-Amharic',normal:'`1234567890-=\\ቀወeረተየuioፐ[]aሰደፈገሀጀከለ፤\'ዘሸቸቨበነመ፣./',shift:{0:'~!@#$%^&*()_+|ቐ',18:'ጠ',21:'ዕ',23:'ጰ{}',27:'ጸዻ',30:'ጘሐ',33:'ኸ',35:'፡"ዠ',39:'ጨ',42:'ኘ',44:'«»፧'},alt:{7:'፨፠'},'cbk':(function(){var i={e:1,i:2,a:3,ie:4,u:5,o:6,ua:7,Y:8},I,l;var o=function(c){if(!c)return 1;var C=/([፲-፺]?)([፩-፱]?)/,e=c.match(C);c=0;if(e[1]){c=(e[1].charCodeAt(0)-0x1371)*10}if(e[2]){c+=e[2].charCodeAt(0)-0x1368}return c};var O=function(c,C){var e='',v;if(c!='00'){if((v=c.charAt(0))!='0'){e=String.fromCharCode(parseInt(v)+0x1371);}if((v=c.charAt(1))!='0'){e+=String.fromCharCode(parseInt(v)+0x1368);}if(e=='፩'&&!C){e=''}}return e};var Q=function(c){var C='',e=c.match(/(([፲-፺]?[፩-፱]?)፼፼)?(([፲-፺]?[፩-፱]?)፻፼)?(([፲-፺]?[፩-፱]?)፼)?(([፲-፺]?[፩-፱]?)፻)?([፲-፺]?[፩-፱]?)?$/);if(e){C=0;if(e[1])C=o(e[2])*100000000;if(e[3])C+=o(e[4])*1000000;if(e[5])C+=o(e[6])*10000;if(e[7])C+=o(e[8])*100;if(e[9])C+=o(e[9]);}return C.toString();};var _=function(c){if(c.length==1)return O('0'+c,1);var C='',e=c.split(/(?=(?:..)+$)/g);if(e.length!=1){if(e[0].length==1)e[0]='0'+e[0];e=e.reverse();}if(e[0]&&e[0]!='00')C=O(e[0],1);if(e[1]){if(e[1]!='00')C=O(e[1])+'፻'+C;if(e[2]){if(e[2]!='00')C=O(e[2])+'፼'+C;if(e[3]){if(e[3]!='00')C=O(e[3])+'፻፼'+C;if(e[4]&&e[4]!='00')C=O(e[4])+'፼፼'+C}}}return C};return{activate:function(){if(!I){var c="'|'1|'2|'3|'4|'5|'6|'7|'8|'9|:፡|_|`|`1|`2|`3|`4|`5|`6|`7|`8|`9|`ህ|`ስ|`ሽ|`ዥ|`ጭ|`ጽ|a|e|i|o|u|ሁi|ህ|ህe|ህi|ህo|ህu|ህህ|ል|ልe|ልi|ልo|ልu|ሕ|ሕe|ሕi|ሕu|ሙe|ሙi|ም|ምe|ምi|ምo|ምu|ሥe|ሥi|ሥu|ር|ርe|ርi|ርo|ርu|ስ|ስe|ስi|ስo|ስu|ስስ|ሽ|ሽe|ሽi|ሽo|ሽu|ሽሽ|ቁi|ቅ|ቅe|ቅi|ቅo|ቅu|ቅይ|ቑe|ቑi|ቕ|ቕe|ቕi|ቕu|ቡe|ቡi|ብ|ብe|ብi|ብo|ብu|ቭ|ቭe|ቭi|ቭu|ት|ትe|ትi|ትo|ትu|ች|ችe|ችi|ችo|ችu|ችች|ኁe|ኁi|ኅe|ኅi|ኅo|ኅu|ን|ንe|ንi|ንo|ንu|ኝ|ኝe|ኝi|ኝo|ኝu|አa|አe|ኢi|ኩe|ኩi|ክ|ክe|ክi|ክo|ክu|ክይ|ኹe|ኹi|ኽ|ኽe|ኽi|ኽu|ኽይ|ው|ውe|ውi|ውo|ዓa|ዝ|ዝe|ዝi|ዝo|ዝu|ዥ|ዥe|ዥi|ዥu|ዥዝ|ዥዥ|ይ|ይe|ይi|ይo|ድ|ድe|ድi|ድo|ድu|ዽ|ዽe|ዽi|ዽo|ዽu|ጅ|ጅe|ጅi|ጅo|ጅu|ጉe|ጉi|ግ|ግe|ግi|ግo|ግu|ግይ|ጙe|ጙi|ጝ|ጝe|ጝi|ጝu|ጥ|ጥe|ጥi|ጥo|ጥu|ጭ|ጭe|ጭi|ጭo|ጭu|ጭች|ጭጭ|ጵ|ጵe|ጵi|ጵo|ጵu|ጽ|ጽe|ጽi|ጽu|ጽስ|ጽጽ|ፅe|ፅi|ፅo|ፉe|ፉi|ፍ|ፍe|ፍi|ፍu|ፑe|ፑi|ፕ|ፕe|ፕi|ፕo|ፕu|፡|፡፡|።፡|፣|፣፣|፤|፧|‹|‹‹|›|››|ⶥe|ⶥi|ⶭe|ⶭi|ⶵe|ⶵi|ⶽe|ⶽi|ⷅe|ⷅi|ⷍe|ⷍi|ⷕe|ⷕi|ⷝe|ⷝi".split('|'),C="'፩፪፫፬፭፮፯፰፱፠_`፩፪፫፬፭፮፯፰፱ኅሥⶥⶵⶽፅአእኢኦኡኊህሀሂሆሁኅልለሊሎሉሕሐሒሑᎀᎁምመሚሞሙሠሢሡርረሪሮሩስሰሲሶሱሥሽሸሺሾሹⶥቊቅቀቂቆቁⷅቘቚቕቐቒቑᎄᎅብበቢቦቡቭቨቪቩትተቲቶቱችቸቺቾቹⶭኈኊኀኂኆኁንነኒኖኑኝኘኚኞኙዓኧዒኰኲክከኪኮኩⷍዀዂኽኸኺኹⷕውወዊዎዐዝዘዚዞዙዥዠዢዡⶵⶵይየዪዮድደዲዶዱዽዸዺዾዹጅጀጂጆጁጐጒግገጊጎጉⷝⶓⶔጝጘጚጙጥጠጢጦጡጭጨጪጮጩⶽⶽጵጰጲጶጱጽጸጺጹፅፅፀፂፆᎈᎉፍፈፊፉᎌᎍፕፐፒፖፑ፡።:፣፥፤፧‹«›»ⶠⶢⶨⶪⶰⶲⶸⶺⷀⷂⷈⷊⷐⷒⷘⷚ".split(''),e="ጪeⶺeዺeጚeⶔeሒeኺeዂeⷒeኚeጲeቒeቚeጺeፂeጢeዢeⶲeቢeᎅeⶪeቺeዲeፊeᎉeጊeጒeⷚeሂeኂeኊeጂeኪeኲeⷊeሊeሚeᎁeኒeፒeᎍeቁeቂeቊeⷂeሪeሲeሢeቲeቪeዊeሺeⶢeዪeዚeጨeⶸeዸeጘeⶓeሐeኸeዀeⷐeኘeጰeቐeቘeጸeፀeጠeዠeⶰeበeᎄeⶨeቸeደeፈeᎈeገeጐeⷘeሀeኀeኈeጀeከeኰeⷈeለeመeᎀeነeፐeᎌeቀeⷀeረeሰeሠeተeቨeወeሸeⶠeየeዘeጭaጮaጩaⶽaⶽoⶽuዽaዾaዹaጝaጝoጙaጙuሕaሕoሑaኽaኽoⷕaኹuኹaⷕoⷕuኝaኞaኙaጵaጶaጱaቕaቕoቑaቑuጽaጽoጹaፅaፆaፅuጥaጦaጡaዥaዥoዡaⶵaⶵoⶵuብaቦaቡaቡuⶭaⶭoⶭuችaቹaቾaድaዶaዱaፍaፍoፉaፉuግaጎaጉaጉuⷝaⷝoⷝuህaሆaሁaሁeሁuኅaኆaኁaኁuጅaጆaጁaክaኮaኩaኩuⷍaⷍoⷍuልaሎaሉaምaሞaሙaሙuንaኖaኑaፕaፖaፑaፑuቅaቆaቁaቁuⷅaⷅoⷅuርaሮaሩaስaሶaሱaሥaሥoሡaትaቶaቱaቭaቭoቩaውaዎaውuሽaሾaሹaⶥaⶥoⶥuይaዮaይuዝaዞaዙaዐaእaኢeኧe`eኡu`u`i`aዒe`Eእe`ዕኦo`oኦaቆoኆoኮoጎo«‹»›'!፠፡፤፤፧፧፥፣፡፣፡-፡+፡#_1_2_3_4_5_6_7_8_0__".split(/(?=(?:..)+$)/g),v="ጬⶼዼጜⶕሔኼዄⷔኜጴቔቜጼፄጤዤⶴቤᎆⶬቼዴፌᎊጌጔⷜሄኄኌጄኬኴⷌሌሜᎂኔፔᎎቈቄቌⷄሬሴሤቴቬዌሼⶤዬዜጬⶼዼጜⶕሔኼዄⷔኜጴቔቜጼፄጤዤⶴቤᎆⶬቼዴፌᎊጌጔⷜሄኄኌጄኬኴⷌሌሜᎂኔፔᎌቄⷄሬሴሤቴቬዌሼⶤዬዜጫⶐጯⶻⶾⶹዻⶍዿጛጞጟⶖሓሖሗኻኾⷓዅዃⷖⷑኛⶉኟጳⶑጷቓቖቛቝጻጾጿፃፇፁጣⶏጧዣዦዧⶳⶶⶱባⶅቧᎇⶫⶮⶩቻቿⶇዳⶌዷፋፎፏᎋጋጏጓጕⷛⷞⷙሃሇኋኈኍኃኇኋኍጃⶎጇካኯኳኵⷋⷎⷉላⶀሏማⶁሟᎃናⶈኗፓⶒፗᎏቃቇቋቍⷃⷆⷁራⶂሯሳⶃሷሣሦሧታⶆቷቫቮቯዋዏዉሻⶄሿⶣⶦⶡያዯዩዛⶋዟኣኣኤእዐዑዑዒዓዔዔዕዕዖዖⶊቈኈኰጐ<>¡:;?,፥፦፠፨᎐᎑᎒᎓᎔᎕᎖᎘᎙_".split('');I={};l={};for(var V=0,x=C.length;V<x;V++)l[c[V]]=C[V];for(var V=0,X=v.length;V<X;V++)I[e[V]]=v[V];c=C=e=v=null}},charProcessor:function(c,C){var e=C+c,v,V,x=1;if(c=='\u0008'){if(C.length){if(v=Q(C)){e=_(v.slice(0,-1));x=e.length}else{e='';x=0;for(var X in l){if(l[X]==C){if(X!=C&&!/^[A-z]/.test(X)){e=X.charAt(0);x=1}break}}}}}else if(C&&c=="'"&&C!="'"){if(!/[፻፩፪፫፬፭፮፯፰፱፼፲፳፴፵፶፷፸፹፺]/.test(C)){e=C;x=0}}else if(C&&C!="'"&&C!="_"&& /\d/.test(c)){V=Q(C)+c;x=0;e=_(V);if(V.length!=10){x=e.length}}else{c=VirtualKeyboard.Langs.ET.conv[c]||c;if(e=l[C+c]){x=e.length}else if(e=I[C+c]){x=0}else if(e=l[c]){e=C+e}else{e=C+c;x=0}}return[e,x]}}})()});

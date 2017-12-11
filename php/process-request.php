<?php
if(isset($_POST["state"])){
    // Capture selected country
    $state = $_POST["state"];

    // Define country and city array
    $stateArr = array(
        "Abia" => array("aba north","aba south","arochukwu","bende","ikwano","isiala ngwa north","isiala ngwa south","isuikwuato","obingwa","ohafia","osisioma","ugwunagbo","ukwa east","ukwa west","umuahia north","umuahia south","umuneochi"),
        'Adamawa'=> array("demsa","fufore","ganaye","gireri","gombi","guyuk","hong","jada","lamurde","madagali","maiha","mayo-belwa","michika","mubi north","mubi south","numan","shelleng","song","toungo","yola north","yola south"),
        'Akwa Ibom' => array("abak","eastern obolo","eket","esit eket","essien udim","etim ekpo","etinan","ibeno","ibesikpo asutan","ibiono ibom","ika","ikono","ikot abasi","ikot ekpene","ini","itu","mbo","mkpat enin","nsit atai","nsit ibom","nsit ubium","obot akara","okobo","onna","oron","oruk anam","udung uko","ukanafun","uruan","urue-offong\/oruko","uyo"),
        'Anambra' => array("aguata","anambra east","anambra west","anaocha","awka north","awka south","ayamelum","dunukofia","ekwusigo","idemili north","idemili south","ihiala","njikoka","nnewi north","nnewi south","ogbaru","onitsha north","onitsha south","orumba north","orumba south","oyi"),
        'Bauchi' => array("alkaleri","bauchi","bogoro","damban","darazo","dass","ganjuwa","giade","itas\/gadau","jama'are","katagum","kirfi","misau","ningi","shira","tafawa-balewa","toro","warji","zaki"),
        'Bayelsa' => array("brass","ekeremor","kolokuma\/opokuma","nembe","ogbia","sagbama","southern jaw","yenegoa"),
        'Benue' => array("ado","agatu","apa","buruku","gboko","guma","gwer east","gwer west","katsina-ala","konshisha","kwande","logo","makurdi","obi","ogbadibo","oju","okpokwu","ohimini","oturkpo","tarka","ukum","ushongo","vandeikya"),
         'Borno'=> array("abadam","askira\/uba","bama","bayo","biu","chibok","damboa","dikwa","gubio","guzamala","gwoza","hawul","jere","kaga","kala\/balge","konduga","kukawa","kwaya kusar","mafa","magumeri","maiduguri","marte","mobbar","monguno","ngala","nganzai","shani"),
         'Cross River' => array("akpabuyo","odukpani","akamkpa","biase","abi","ikom","yarkur","odubra","boki","ogoja","yala","obanliku","obudu","calabar south","etung","bekwara","bakassi","calabar municipality"),
         'Delta' => array("oshimili","aniocha","aniocha south","ika south","ika north-east","ndokwa west","ndokwa east","isoko south","isoko north","bomadi","burutu","ughelli south","ughelli north","ethiope west","ethiope east","sapele","okpe","warri north","warri south","uvwie","udu","warri central","ukwani","oshimili north","patani"),
         'Ebonyi' => array("afikpo south","afikpo north","onicha","ohaozara","abakaliki","ishielu","lkwo","ezza","ezza south","ohaukwu","ebonyi","ivo"),
         'Edo' => array("esan north-east","esan central","esan west","egor","ukpoba","central","etsako central","igueben","oredo","ovia southwest","ovia south-east","orhionwon","uhunmwonde","etsako east","esan south-east"),
         'Ekiti' => array("ado","ekiti-east","ekiti-west","emure\/ise\/orun","ekiti south-west","ikare","irepodun","ijero","ido\/osi","oye","ikole","moba","gbonyin","efon","ise\/orun","ilejemeje"),
         'Enugu' => array("enugu south","igbo-eze south","enugu north","nkanu","udi agwu","oji-river","ezeagu","igboeze north","isi-uzo","nsukka","igbo-ekiti","uzo-uwani","enugu east","aninri","nkanu east","udenu"),
         'FCT' => array("gwagwalada","kuje","abaji","abuja municipal","bwari","kwali"),
         'Gombe' => array("akko","balanga","billiri","dukku","kaltungo","kwami","shomgom","funakaye","gombe","nafada\/bajoga","yamaltu\/delta"),
         'Imo' => array("aboh-mbaise","ahiazu-mbaise","ehime-mbano","ezinihitte","ideato north","ideato south","ihitte\/uboma","ikeduru","isiala mbano","isu","mbaitoli","mbaitoli","ngor-okpala","njaba","nwangele","nkwerre","obowo","oguta","ohaji\/egbema","okigwe","orlu","orsu","oru east","oru west","owerri-municipal","owerri north","owerri west"),
         'Jigawa' => array("auyo","babura","birni kudu","biriniwa","buji","dutse","gagarawa","garki","gumel","guri","gwaram","gwiwa","hadejia","jahun","kafin hausa","kaugama kazaure","kiri kasamma","kiyawa","maigatari","malam madori","miga","ringim","roni","sule-tankarkar","taura","yankwashi"),
         'Kaduna' => array("birni-gwari","chikun","giwa","igabi","ikara","jaba","jema'a","kachia","kaduna north","kaduna south","kagarko","kajuru","kaura","kauru","kubau","kudan","lere","makarfi","sabon-gari","sanga","soba","zango-kataf","zaria"),
         'Kano' => array("ajingi","albasu","bagwai","bebeji","bichi","bunkure","dala","dambatta","dawakin kudu","dawakin tofa","doguwa","fagge","gabasawa","garko","garum","mallam","gaya","gezawa","gwale","gwarzo","kabo","kano municipal","karaye","kibiya","kiru","kumbotso","kunchi","kura","madobi","makoda","minjibir","nasarawa","rano","rimin gado","rogo","shanono","sumaila","takali","tarauni","tofa","tsanyawa","tudun wada","ungogo","warawa","wudil"),
         'Katsina' => array("bakori","batagarawa","batsari","baure","bindawa","charanchi","dandume","danja","dan musa","daura","dutsi","dutsin-ma","faskari","funtua","ingawa","jibia","kafur","kaita","kankara","kankia","katsina","kurfi","kusada","mai'adua","malumfashi","mani","mashi","matazuu","musawa","rimi","sabuwa","safana","sandamu","zango"),
         'Kebbi' => array("aleiro","arewa-dandi","argungu","augie","bagudo","birnin kebbi","bunza","dandi","fakai","gwandu","jega","kalgo","koko\/besse","maiyama","ngaski","sakaba","shanga","suru","wasagu\/danko","yauri","zuru"),
         'Kogi' => array("adavi","ajaokuta","ankpa","bassa","dekina","ibaji","idah","igalamela-odolu","ijumu","kabba\/bunu","kogi","lokoja","mopa-muro","ofu","ogori\/mangongo","okehi","okene","olamabolo","omala","yagba east","yagba west"),
         'Kwara' => array("asa","baruten","edu","ekiti","ifelodun","ilorin east","ilorin west","irepodun","isin","kaiama","moro","offa","oke-ero","oyun","pategi"),
         'Lagos' => array("agege","ajeromi-ifelodun","alimosho","amuwo-odofin","apapa","badagry","epe","eti-osa","ibeju\/lekki","ifako-ijaye","ikeja","ikorodu","kosofe","lagos island","lagos mainland","mushin","ojo","oshodi-isolo","shomolu","surulere"),
         'Nasarawa' => array("akwanga","awe","doma","karu","keana","keffi","kokona","lafia","nasarawa","nasarawa-eggon","obi","toto","wamba"),
         'Niger' => array("agaie","agwara","bida","borgu","bosso","chanchaga","edati","gbako","gurara","katcha","kontagora","lapai","lavun","magama","mariga","mashegu","mokwa","muya","pailoro","rafi","rijau","shiroro","suleja","tafa","wushishi"),
         'Ogun' => array("abeokuta north","abeokuta south","ado-odo\/ota","egbado north","egbado south","ewekoro","ifo","ijebu east","ijebu north","ijebu north east","ijebu ode","ikenne","imeko-afon","ipokia","obafemi-owode","ogun waterside","odeda","odogbolu","remo north","shagamu"),
         'Ondo' => array("akoko north east","akoko north west","akoko south akure east","akoko south west","akure north","akure south","ese-odo","idanre","ifedore","ilaje","ile-oluji","okeigbo","irele","odigbo","okitipupa","ondo east","ondo west","ose","owo"),
         'Osun' => array("aiyedade","aiyedire","atakumosa east","atakumosa west","boluwaduro","boripe","ede north","ede south","egbedore","ejigbo","ife central","ife east","ife north","ife south","ifedayo","ifelodun","ila","ilesha east","ilesha west","irepodun","irewole","isokan","iwo","obokun","odo-otin","ola-oluwa","olorunda","oriade","orolu","osogbo"),
         'Oyo' => array("afijio","akinyele","atiba","atigbo","egbeda","ibadan central","ibadan north","ibadan north west","ibadan south east","ibadan south west","ibarapa central","ibarapa east","ibarapa north","ido","irepo","iseyin","itesiwaju","iwajowa","kajola","lagelu ogbomosho north","ogbmosho south","ogo oluwa","olorunsogo","oluyole","ona-ara","orelope","ori ire","oyo east","oyo west","saki east","saki west","surulere"),
         'Plateau' => array("barikin ladi","bassa","bokkos","jos east","jos north","jos south","kanam","kanke","langtang north","langtang south","mangu","mikang","pankshin","qua'an pan","riyom","shendam","wase"),
         'Rivers' => array("abua\/odual","ahoada east","ahoada west","akuku toru","andoni","asari-toru","bonny","degema","emohua","eleme","etche","gokana","ikwerre","khana","obia\/akpor","ogba\/egbema\/ndoni","ogu\/bolo","okrika","omumma","opobo\/nkoro","oyigbo","port-harcourt","tai"),
         'Sokoto' => array("binji","bodinga","dange-shnsi","gada","goronyo","gudu","gawabawa","illela","isa","kware","kebbe","rabah","sabon birni","shagari","silame","sokoto north","sokoto south","tambuwal","tqngaza","tureta","wamako","wurno","yabo"),
         'Taraba' => array(),
         'Yobe' => array("bade","bursari","damaturu","fika","fune","geidam","gujba","gulani","jakusko","karasuwa","karawa","machina","nangere","nguru potiskum","tarmua","yunusari","yusufari"),
         'Zamfara' => array("anka","bakura","birnin magaji","bukkuyum","bungudu","gummi","gusau","kaura","namoda","maradun","maru","shinkafi","talata mafara","tsafe","zurmi")
    );

    // Display city dropdown based on country name
    if($state !== 'Select State'){
       // echo "<label>Local Govt:</label>";
        echo '<select name="local_govt" style="color:red; border-radius: 10px; height: 100%; width: 12em; font-size: 20px">';
        foreach($stateArr[$state] as $value){
            echo "<option value='.$value.'>". $value . "</option>";
        }
        echo "</select>";
    }
}
?>


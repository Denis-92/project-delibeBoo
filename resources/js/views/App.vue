<template>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>


        <HeaderGuest />
        <AnimationGuest />
        <FixAnimat />


    </div>
</body>
</html>
  </template>
  
  <script>
  
  import HeaderGuest from '../components/HeaderGuest.vue';
  import AnimationGuest from '../components/AnimationGuest.vue';
  import FixAnimat from '../components/FixAnimat.vue';
  
  
  export default {
      name: 'app',
      components: { HeaderGuest, AnimationGuest, FixAnimat },
      
      }
  </script>
  
  <style scoped lang="scss">
  *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

  

  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');


  </style>
  
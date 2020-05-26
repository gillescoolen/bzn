<template>
  <div class="container">
    <img
      class="logo"
      src="/assets/BIO_logo.png"
      alt="Het logo van biodiversiteit bosgroep zuid nederland"
    />

    <div class="block-1">
      <div class="header">
        <h1>Biodiversiteit</h1>
        <h3>Stresstest</h3>
      </div>

      <div class="municipality-list">
        <h3>Selecteer uw gemeente:</h3>
      </div>

      <div class="title">
        <span>
          <i class="fas fa-arrow-down"></i>
        </span>
        <h4>Over het project</h4>
      </div>
    </div>

    <div class="about">
      <div class="boxes">
        <div class="explanation">
          <h3>Uitleg project</h3>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, accusamus beatae dolore fuga optio, delectus reiciendis eaque fugiat cumque doloribus molestiae numquam nesciunt! Dolore obcaecati doloremque error facilis pariatur adipisci perferendis ipsum cumque iusto dicta est amet, quod debitis eligendi expedita molestias sed, asperiores accusantium unde ad reprehenderit. Sunt, impedit.</p>
        </div>
        <div class="purpose">
          <h3>Doel project</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam sit repellat distinctio quis expedita, reiciendis et! Voluptas eos autem, facilis distinctio sequi vero aliquam modi deserunt perspiciatis reprehenderit odit nihil inventore adipisci corrupti, dolores nesciunt voluptatum! Ex excepturi vero impedit. Asperiores, sed cupiditate accusamus quisquam iusto est adipisci ratione aspernatur.</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.container {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  .button {
    width: 5rem;
    color: white;
  }

  .logo {
    transform: rotate(-20deg);
    width: 350px;
    z-index: 0;
    position: absolute;
    right: -30px;
    top: 30%;
  }

  .block-1 {
    height: calc(100vh - 4rem);

    .header {
      text-transform: uppercase;

      h1 {
        font-family: 'Bebas Neue';
        font-size: 70px;
        margin: 0;
      }

      h3 {
        font-family: 'Midnight Champion';
        font-size: 50px;
        margin: -20px 0 0 130px;
      }
    }

    .municipality-list {
      display: flex;
      justify-content: center;
      min-height: calc(100% - 240px);

      h3 {
        font-family: 'Bebas Neue';
        font-size: 40px;
      }
    }

    .title {
      display: flex;
      justify-content: center;
      align-items: center;

      span {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        height: 30px;
        width: 30px;
        margin-right: 10px;
        background-color: orange;
        border-radius: 50%;

        i {
          color: white;
          font-size: 20px;
        }
      }

      h4 {
        font-family: 'Midnight Champion';
        font-size: 30px;
        font-weight: normal;
        text-transform: uppercase;
        margin-left: 10px;
      }
    }
  }

  .about {
    z-index: 1;

    .boxes {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;

      > div {
        padding: 15px;
        max-width: 500px;
      }

      h3 {
        font-family: 'Midnight Champion';
        font-size: 40px;
        font-weight: normal;
        text-transform: uppercase;
        text-align: center;
      }

      p {
        font-family: 'Midnight Champion';
        font-size: 26px;
      }
    }
  }
}
</style>

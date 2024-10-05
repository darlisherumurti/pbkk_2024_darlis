<template>
    <div>
        <div class="card">
            <div class="card-header">
                <ul
                    class="nav nav-tabs card-header-tabs"
                    id="myTab"
                    role="tablist"
                >
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            id="data-binding-tab"
                            data-toggle="tab"
                            href="#data-binding"
                            role="tab"
                            aria-controls="data-binding"
                            aria-selected="true"
                            >Dasar</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="profile-tab"
                            data-toggle="tab"
                            href="#profile"
                            role="tab"
                            aria-controls="profile"
                            aria-selected="false"
                            >Reactive Object</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="contact-tab"
                            data-toggle="tab"
                            href="#contact"
                            role="tab"
                            aria-controls="contact"
                            aria-selected="false"
                            >Deep Watcher</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="v-on-tab"
                            data-toggle="tab"
                            href="#v-on"
                            role="tab"
                            aria-controls="v-on"
                            aria-selected="false"
                            >Immediate Watcher</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="tab5-tab"
                            data-toggle="tab"
                            href="#tab5"
                            role="tab"
                            aria-controls="tab5"
                            aria-selected="false"
                            >Once Wacther</a
                        >
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div
                        class="tab-pane fade show active"
                        id="data-binding"
                        role="tabpanel"
                        aria-labelledby="data-binding-tab"
                    >
                        <div>
                            <p>
                                Vue watcher adalah fitur di Vue.js yang
                                memungkinkan pengguna untuk mengamati perubahan
                                pada data, seperti properti, dan melakukan
                                tindakan sebagai respons terhadap perubahan
                                tersebut.
                            </p>
                            <h2>Example</h2>
                            <div class="row">
                                <div class="col text-sm">
                                    <pre class="max-w-100" v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;Watch the Count&lt;/h1&gt;
    &lt;button @click=&quot;increment&quot;&gt;Increment&lt;/button&gt;
    &lt;p&gt;Count: {{ count }}&lt;/p&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
import { ref, watch } from &apos;vue&apos;;

export default {
  setup() {
    const count = ref(0); // Create a reactive reference

    const increment = () =&gt; {
      count.value++;
    };

    // Basic Watcher
    watch(count, (newVal, oldVal) =&gt; {
      console.log(&grave;Count changed from ${oldVal} to ${newVal}&grave;);
      // Perform actions here
    });

    return { count, increment };
  }
};
&lt;/script&gt;
                                    </code>
                                </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="profile"
                        role="tabpanel"
                        aria-labelledby="profile-tab"
                    >
                        <h2>Contoh watcher untuk reactive object</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;Reactive Object Watcher Example&lt;/h1&gt;
    &lt;p&gt;Name: {{ obj.name }}&lt;/p&gt;
    &lt;p&gt;Age: {{ obj.age }}&lt;/p&gt;
    &lt;button @click=&quot;incrementAge&quot;&gt;Increment Age&lt;/button&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
import { reactive, watch } from &apos;vue&apos;;

export default {
  setup() {
    const obj = reactive({
      name: &apos;Alice&apos;,
      age: 30
    });
    
    watch(
      () =&gt; obj.age,
      (newAge) =&gt; {
        console.log(&grave;Age changed to: ${newAge}&grave;);
      }
    );

    const incrementAge = () =&gt; {
      obj.age++;
    };

    return { obj, incrementAge};
  }
};
&lt;/script&gt;

                                    </code>
                                </pre>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="contact"
                        role="tabpanel"
                        aria-labelledby="contact-tab"
                    >
                        <p>
                            Vue deep watcher adalah fitur yang memungkinkan
                            pengguna untuk mengawasi perubahan pada properti
                            bersarang (nested) di objek yang dipantau. Deep
                            watcher berguna ketika Anda memiliki objek atau
                            array yang kompleks dan ingin bereaksi terhadap
                            perubahan di dalam struktur tersebut.
                        </p>
                        <h2>Example</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;User Profile&lt;/h1&gt;
    &lt;p&gt;Name: {{ user.profile.name }}&lt;/p&gt;
    &lt;p&gt;Age: {{ user.profile.age }}&lt;/p&gt;
    &lt;button @click=&quot;incrementAge&quot;&gt;Increment Age&lt;/button&gt;
    &lt;button @click=&quot;changeName&quot;&gt;Change Name&lt;/button&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
import { reactive, watch } from &apos;vue&apos;;

export default {
  setup() {
    // Create a reactive object with nested properties
    const user = reactive({
      profile: {
        name: &apos;Alice&apos;,
        age: 30
      }
    });

    // Deep watcher for the profile object
    watch(
      () =&gt; user.profile, // Watching the entire profile object
      (newProfile, oldProfile) =&gt; {
        console.log(&apos;Profile changed:&apos;, {
          oldName: oldProfile.name,
          newName: newProfile.name,
          oldAge: oldProfile.age,
          newAge: newProfile.age
        });
      },
      { deep: true } // Enable deep watching
    );

    // Method to increment the age
    const incrementAge = () =&gt; {
      user.profile.age++;
    };

    // Method to change the name
    const changeName = () =&gt; {
      user.profile.name = user.profile.name === &apos;Alice&apos; ? &apos;Bob&apos; : &apos;Alice&apos;;
    };

    return { user, incrementAge, changeName }; // Expose reactive object and methods to template
  }
};
&lt;/script&gt;

                                    </code>
                                </pre>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="v-on"
                        role="tabpanel"
                        aria-labelledby="v-on-tab"
                    >
                        <p>
                            Vue immediate watcher adalah fitur Vue.js yang
                            memungkinkan fungsi panggilan balik untuk dijalankan
                            segera setelah Watcher dibuat.
                        </p>
                        <h2>Example</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;Immediate Watcher Example&lt;/h1&gt;
    &lt;input v-model=&quot;count&quot; placeholder=&quot;Type a number&quot; /&gt;
    &lt;p&gt;Current Count: {{ count }}&lt;/p&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
export default {
  data() {
    return {
      count: 0
    };
  },
  watch: {
    count: {
      handler(newVal) {
        console.log(&grave;Count changed to: ${newVal}&grave;);
      },
      immediate: true // This option will trigger the watcher immediately
    }
  }
};
&lt;/script&gt;
                                    </code> 
                                </pre>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="tab5"
                        role="tabpanel"
                        aria-labelledby="tab5-tab"
                    >
                        <p>
                            Vue once watcher adalah pengamat yang hanya aktif
                            satu kali. Untuk menggunakannya.
                        </p>
                        <h2>Example</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;Once Watcher Example&lt;/h1&gt;
    &lt;input v-model=&quot;count&quot; placeholder=&quot;Type a number&quot; /&gt;
    &lt;p&gt;Current Count: {{ count }}&lt;/p&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
import { ref, watch } from &apos;vue&apos;;

export default {
  setup() {
    const count = ref(0); 

    // Once watcher
    watch(count, (newVal) =&gt; {
        //...logic
    },
    {once: true }
    );
    return { count }; 
  }
};
&lt;/script&gt;
                                    </code> 
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts"></script>

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
                            >Data Binding</a
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
                            >Computed Properties</a
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
                            >Fungsi Ref()</a
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
                            >Fungsi Reactive()</a
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
                                Vue 2 makes use of a two-way data binding system
                                that automatically updates the DOM when the data
                                changes and vice versa. The data() function in
                                Vue 2 is used to declare reactive properties.
                                When any of these properties change, Vue
                                automatically updates the corresponding DOM
                                elements, reflecting the new state in real-time.
                            </p>
                            <h2>Data binding</h2>
                            <div class="row">
                                <div class="col text-sm">
                                    <pre class="max-w-100" v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
    &lt;div&gt;
        &lt;p&gt;{{ message }}&lt;/p&gt;
    &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
    export default {
        data() {
            return {
            message: 'Hello Vue!'
            };
        }
    };
&lt;/script&gt;
                                    </code>
                                </pre>
                                </div>
                            </div>
                            <br />
                            <h2>Data binding with event handling</h2>
                            <div class="row">
                                <div class="col text-sm">
                                    <pre class="max-w-100" v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
    &lt;div&gt;
        &lt;p&gt;{{ message }}&lt;/p&gt;
        &lt;button @click="changeMessage"&gt;Change Message&lt;/button&gt;
    &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
    export default {
        data() {
            return {
                message: 'Hello Vue!'
            };
        },
        methods: {
            changeMessage() {
                this.message = 'Message Changed!';
            }
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
                        <p>
                            Computed property Vue adalah properti yang dihitung
                            dalam instance Vue yang menghitung nilai, bukan
                            menyimpannya. Properti ini bersifat dinamis, artinya
                            berubah tergantung pada nilai properti data.
                        </p>
                        <h2>Example</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
    &lt;div&gt;
        &lt;h1&gt;Full Name: {{ fullName }}&lt;/h1&gt;
        &lt;input v-model="firstName" placeholder="First Name" /&gt;
        &lt;input v-model="lastName" placeholder="Last Name" /&gt;
    &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
export default {
    data() {
        return {
            firstName: 'John',
            lastName: 'Doe'
        };
    },
    computed: {
        fullName() {
            return `${this.firstName} ${this.lastName}`;
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
                        id="contact"
                        role="tabpanel"
                        aria-labelledby="contact-tab"
                    >
                        <p>
                            Ref() adalah fungsi di Vue yang membuat referensi
                            reaktif ke suatu nilai. Ref() dapat digunakan untuk
                            membuat referensi ke: Tipe primitif seperti string,
                            angka, atau boolean Objek atau array, tetapi hanya
                            referensi itu sendiri yang reaktif
                        </p>
                        <h2>Example</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">

&lt;template&gt; 
    &lt;div&gt;
        &lt;h1&gt;{{ count }}&lt;/h1&gt;
        &lt;button @click="increment"&gt;Increment&lt;/button&gt;
    &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
import { ref } from 'vue';

export default {
    setup() {
        const count = ref(0); // Create a reactive reference to a number

        const increment = () => {
            count.value++; 
        };

        return {
            count,
            increment
        }; 
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
                            Vue reactive() adalah fungsi yang digunakan untuk
                            membuat properti reaktif dalam Vue.js. Vue
                            reactive() mengonversi objek secara mendalam,
                            sehingga objek bersarang juga akan dibungkus dengan
                            reactive() saat diakses.
                        </p>
                        <p>
                            fungsi reactive digunakan jika ingin membuat objek
                            atau array yang reaktif
                        </p>
                        <h2>Example</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;{{ user.name }}&lt;/h1&gt;
    &lt;p&gt;Age: {{ user.age }}&lt;/p&gt;
    &lt;button @click=&quot;incrementAge&quot;&gt;Increment Age&lt;/button&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
import { reactive } from &apos;vue&apos;;

export default {
  setup() {
    const user = reactive({
      name: &apos;Alice&apos;,
      age: 30
    }); // Create a reactive object

    const incrementAge = () =&gt; {
      user.age++;
    };

    return { user, incrementAge }; 
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

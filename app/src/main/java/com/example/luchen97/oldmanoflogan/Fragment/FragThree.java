package com.example.luchen97.oldmanoflogan.Fragment;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.Toast;

import com.example.luchen97.oldmanoflogan.Adapter.NewFeedOfMeAdp;
import com.example.luchen97.oldmanoflogan.Entries.NewFeedOfMe;
import com.example.luchen97.oldmanoflogan.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class FragThree extends Fragment {

    ListView listView;
    ArrayList<NewFeedOfMe> newFeeds;
    NewFeedOfMeAdp newFeedAdp;
    int id_newfeed=0;
    int id_user_newfeed=0;
    String status_newfeed="";
    String image_newfeed="";

    public FragThree() {
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_frag_three, container, false);
        listView= (ListView) view.findViewById(R.id.listofme);
        newFeeds=new ArrayList<>();
        newFeedAdp=new NewFeedOfMeAdp(newFeeds,getContext());
        // FragOne fragOne=new FragOne();
        Bundle bundle = getArguments();
        if (bundle!=null){
           // Toast.makeText(getContext(), "bundle: "+bundle.getString("data"), Toast.LENGTH_SHORT).show();
            String data=bundle.getString("data");
            try {
                JSONArray jsonArray=new JSONArray(data);
                for (int i = 0; i <jsonArray.length() ; i++) {
                    JSONObject jsonObject= (JSONObject) jsonArray.get(i);
                    id_newfeed = jsonObject.getInt("id");
                    id_user_newfeed = jsonObject.getInt("id_user");
                    status_newfeed = jsonObject.getString("status");
                    image_newfeed = jsonObject.getString("image");
                 //   Toast.makeText(getContext(), "dđ"+status_newfeed, Toast.LENGTH_SHORT).show();
                    newFeeds.add(new NewFeedOfMe(id_newfeed, id_user_newfeed, status_newfeed, image_newfeed));

                }
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
        else {
            Toast.makeText(getContext(), "null", Toast.LENGTH_SHORT).show();
        }
        listView.setAdapter(newFeedAdp);
        newFeedAdp.notifyDataSetChanged();
        return view;
    }
}
